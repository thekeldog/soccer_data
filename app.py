from flask import Flask, request, jsonify 
from flask_cors import CORS
import pickle
import sys
import json
import numpy as np
import pandas as pd
from sklearn.model_selection import cross_val_score
from sklearn.decomposition import PCA
# Preprocessing
from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
# Models
from sklearn.ensemble import RandomForestClassifier
from sklearn.neighbors import KNeighborsClassifier
from sklearn.ensemble import GradientBoostingClassifier
from sklearn.model_selection import GridSearchCV
from sklearn.naive_bayes import GaussianNB

class Data():
	def __init__(self):
		print("data")
	def build_table(self,league_name, all_seasons_dat, year):
		table = {} ## table[position] = {'team': team_name, 'wins': num, 'draws': num, 'losses': num, 'points': num}
		print(league_name)
		print(year)
		for season in all_seasons_dat:
			#print("season",season['league_slug'])
			if season['league_slug'] == league_name:
				#print('Standings for ' + season['league_slug'] +' ' +season['name'] +':')
				#print('pos\tteam\t\tw d l pts')
				if(year == season['name']):
					#print("year match", year," ", season['name'])
					for row in season['standings']:
						overall = row['overall']
						table[row['position']] = {}
						table[row['position']]['team'] = row['team']
						table[row['position']]['wins'] = overall['wins']
						table[row['position']]['draws'] = overall['draws']
						table[row['position']]['losses'] = overall['losts']
						table[row['position']]['points'] = overall['points']
					#print(str(row['position']) + row['team']+str(overall['wins']) +str(overall['draws']) + str(overall['losts']) + str(overall['points']))	

					return (jsonify(table))
class Model():
	def __init__(self):
		print('\n \n \n start')
        
	def build(self):
		print("\n BUILD: \n")
		clean_train = pd.read_csv('CleanPLTrain')
		col_names = list(clean_train)
		self.train_y = clean_train['FTR']
		clean_train = clean_train.drop(['Unnamed: 0','FTR','Upset',
                                'PredictedOutcome',
                                'UpsetNumeric'], axis=1
                              )
		clean_test = pd.read_csv('CleanPLTest')
		self.test_y = clean_test['FTR']
		clean_test = clean_test.drop(['Unnamed: 0','FTR', 'Upset',
                              'PredictedOutcome',
                              'UpsetNumeric'],axis=1
                            )
		''' preprocessing/pca '''
		#clean_test.to_csv('output.csv')
		self.scaler = StandardScaler()
		self.scaled_train_x = self.scaler.fit_transform(X=clean_train,y=None)
		self.scaled_test_x = self.scaler.fit_transform(clean_test)
		self.odds_omitted_train_x = self.scaled_train_x[:,3:]
		self.odds_omitted_test_x = self.scaled_test_x[:,3:]
		with open('team_agg_stats.pkl', 'rb') as f:
			self.team_agg_stats = pickle.load(f)
			print("stats loaded")
		#print(self.team_agg_stats)
		
	def train_models(self):
		rf_score = self.randomForest()
		nb_score = self.naiveByes()
		return nb_score, rf_score
		
	def randomForest(self):
		print("\n RF:")
		self.rf = RandomForestClassifier(n_estimators=100, max_depth=2,random_state=0)
		self.rf.fit(self.odds_omitted_train_x,self.train_y)
		score = self.rf.score(self.odds_omitted_test_x,self.test_y)
		print(score)
		return score


	def naiveByes(self):
		print("\n NB:")
		self.nb = GaussianNB()
		self.nb.fit(self.odds_omitted_train_x,self.train_y)
		score = self.nb.score(self.odds_omitted_test_x,self.test_y)
		print(score)
		return score

	def predict_methods(self, home, away):
		generated_values = [[self.team_agg_stats[home]['H_W'], self.team_agg_stats[away]['A_W'],
				    self.team_agg_stats[home]['H_D'], self.team_agg_stats[away]['A_D'],
				    self.team_agg_stats[home]['H_L'], self.team_agg_stats[away]['A_L'],
				    self.team_agg_stats[home]['H_avg_scored'], self.team_agg_stats[away]['A_avg_scored'],
				    self.team_agg_stats[home]['H_avg_conceeded'], self.team_agg_stats[away]['A_avg_conceeded'],
				    self.team_agg_stats[home]['H_goalDiff'], self.team_agg_stats[away]['A_goalDiff']]]
		scaled_values = self.scaler.fit_transform(generated_values)
		nb_prediction = self.nb.predict(scaled_values)
		rf_prediction = self.rf.predict(scaled_values)
		return nb_prediction, rf_prediction


app = Flask(__name__)


@app.route('/', methods=['GET', 'POST'])
def model():
	if request.method == "POST":
		results = request.get_json(force=True)
		if results['model']:
			print('building model: ', results)
			model = Model()
			model.build()
			nb_score, rf_score = model.train_models()
			nb_prediction, rf_prediction = model.predict_methods(results['home'], results['away'])
			return jsonify({"nb_score":nb_score,"nb_prediction":nb_prediction[0],"rf_score":rf_score,"rf_prediction":rf_prediction[0]})

		return jsonify({"error": "bad request"})

@app.route('/build_table', methods=['GET','POST'])
def data_fetch():
	stuff = Data()
	results = request.get_json(force=True)
	with open('all_seasons_meta_data.pkl', 'rb') as f:
		all_seasons_dat = pickle.load(f)

	return(stuff.build_table(results['league_name'], all_seasons_dat,results['year']))	

if __name__ == '__main__': 
	CORS(app, support_credentials=True)   
	app.run(debug = True, host="0.0.0.0", port=8125)
