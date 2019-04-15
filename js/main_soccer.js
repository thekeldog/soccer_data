$(document).on('ready', function() {
    console.log("I'm ready BITCH!");
    // First call to populate some data
    $.ajax({
        type: "GET",
        url: "./api/soccer.php",
        dataType: "json",
        data: {},
        success: function(data) {
           console.log(data);
        },
        error: function(err) {
            console.log(err);  
        },
        complete: function(data, status) {
          // Called whether success or error
          //console.log(status);
        }
    });
    
});