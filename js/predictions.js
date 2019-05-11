$("document").ready(function() {

    $.ajax({
        type: "get",
        url: "api/predictions.php",
        dataType: "html",
        data: {
            'league_slug': 'true'
        },
        success: function(data) {
            console.log(data);
            $("#league").html(data);
        },
        error: function(stats) {
            console.log(stats)

        }
    });
    $("#league").on('change', function() {
        console.log($("#league :selected").val())
        $.ajax({
            type: "get",
            url: "api/predictions.php",
            dataType: "html",
            data: {
                'team': $("#league :selected").val()
            },
            success: function(data) {
                console.log(data);
                $("#team1").html(data);
                $("#team2").html(data);
            },
            error: function(stats) {
                console.log(stats)

            }
        });
    })

    $("#clear").click(function() {
        $("#results").html('')
        return false;
    })

    $("#predict").click(function() {
        $.ajax({
            type: "get",
            url: "api/predictions.php",
            dataType: "json",
            data: {
                'subscription':'true'
            },
            success: function(data) {
                console.log(data[0]);
                if (data[0] == "Plat"){
                    $.ajax({
            type: "post",
            url: "https://35.243.223.222:8125/",
            dataType: "JSON",
            data: JSON.stringify({
                "model": "build",
                "home": $("#team1 :selected").val(),
                "away": $("#team2 :selected").val()
            }),
            success: function(data) {
                console.log(data);
                console.log(data['nb_prediction'])
                $("#results").append('<div class ="col"><div class="card" style="width: 18rem;">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">Predicted Outcome</h5>' +
                    '<h5 class="card-title">' + $("#team1").val() + ' vs ' + $("#team2").val() +
                    '<h6 class="card-subtitle mb-2 text-muted">Naive Byes: ' + data['nb_prediction'] + '</h6>' +
                    '<o class="card-text ">Confidence:' + data['nb_score'] + ' </o>' +
                    '<h6 class="card-subtitle mb-2 text-muted">Random Forest: ' + data['rf_prediction'] + '</h6>' +
                    '<o class="card-text" >Confidence:' + data['rf_score'] + '</o>' +
                    '</div></div></div>')
            },
            error: function(stats) {
                console.log(stats)

            }
        });
                }
            },
            error: function(stats) {
            console.log(stats)
        
            }
        });
        
        return false;
    })

})
