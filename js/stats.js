$(document).ready( function(){
    console.log("I'm ready!");
    
    $.ajax({
        type: "GET",
        url: "./api/soccer.php",
        dataType: "html",
        data: {"dataRequested" : 'leagues'},
        success: function(data, status){
            $('#tableRow').html(data);
        }
    })
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

    $('#viewLeagues').hide();
        // get league data when first loading page
        $('#queryLeagues').click(function() {
 
    })
        
        $('#viewLeagues').click(function(){
            $('#leaguesTable').hide();
            $('#leaguesTable').html('');
            var league = $('#leagueSelect option:selected').val();
            var slug = $();
            var prettyLeague = $('#leagueSelect option:selected').text();
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
            $.ajax({
                type: "GET",
                url: "./api/soccer.php",
                dataType: "html",
                data: {"dataRequested" : 'buildTable',
                      "league_name" : league,
                      "year" : "2018-2019"
                },
                success: function(data, status){
                    //console.log(data);
                    var headerString = ("2018-2019 " + prettyLeague + " League Table")
                    $('#leagueTableHeader').html("<h2>" +headerString+"</h2>")
                    
                    $('#leagueTableRow').html(data)
                }
            })
            
        })
        
        // tab on clicks
        $('#queryTeams').click(function(){
            console.log("teams clicked")

        })
        



    
})