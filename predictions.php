<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href='./styles/model.css'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
      <link rel="shortcut icon" type="image/x-icon" href="/media/favicon.ico">
      
    <div id = "head">
    <?php
    include 'header.php';
    ?>
  </div>
</head>
<body>
    
<form style="padding-top:100px; padding-left:10px;">
  <div class="form-row">
    <div class="col">
        <select class="form-control" id="league">
          <option>League Select</option>
        </select>
    </div>
    <div class="col">
        <select class="form-control" id= "team1">
          <option>Home Team</option>
        </select>
    </div>
    <div class="col">
        <select class="form-control" id="team2">
          <option>Away Team</option>
        </select>
    </div>
    <div class="col">
      <button id="predict" type="submit" class="btn btn-primary">Predict</button>
    </div>
        <div class="col">
      <button id="clear" type="submit" class="btn btn-primary">Clear</button>
    </div>
  </div>
  <div class = ".container-fluid" style = "padding: 75px;">
      <div id ="results" class = "row ">
      </div>
    </div>
    </div>
</form>

<footer class="container">
      <?php
    include 'footer.php';?>
    </footer>
</body>
<script src="js/predictions.js"></script>
</html>