$(document).ready( function(){
    console.log("I'm ready!");
    
    // $.ajax({
    //     type:"POST",
    //     url: "http://35.243.223.222:8125/build_table",
    //     dataType: "JSON",
    //     data: JSON.stringify({"league_name": "nonsense",
    //             "year" : "2017-2018"
    //     }),
    //     success: function(data){
    //         console.log(data);
    //     }
    // })
    
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
            var slug = $();
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
                    $('#leagueTableRow').html(data)
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