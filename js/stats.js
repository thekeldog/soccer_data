$(document).ready( function(){
    console.log("I'm ready!");
    $('#viewLeagues').hide();
        // get league data when first loading page
        $('#queryLeagues').click(function() {
           $.ajax({
            type: "GET",
            url: "./api/soccer.php",
            dataType: "html",
            data: {"dataRequested" : 'leagues'},
            success: function(data, status){
                 $('#tableRow').html(data);
            }
            }) 
        })
        
        $('#viewLeagues').click(function(){
            var league = $('#leagueSelect option:selected').val();
            $.ajax({
            type: "GET",
            url: "./api/soccer.php",
            dataType: "html",
            data: {"dataRequested" : 'teams',
                  "league_slug" : league
            },
            success: function(data, status){
                 $('#tableRow').html(data);
            }
        })
        })
        
        // tab on clicks
        $('#queryTeams').click(function(){
            console.log("teams clicked")
            $('#leaguesTable').hide();
            $('#leaguesTable').html('');
            
            $.ajax({
                type: "GET",
                url: "./api/soccer.php",
                dataType: "html",
                data: {"dataRequested" : 'leaguePicker'},
                success: function(data){
                    $('#picker').html(data);
                    $('#viewLeagues').show();
                }
            })
            

        })
        



    
})