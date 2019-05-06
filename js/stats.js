$(document).ready( function(){
    console.log("I'm ready!");
        // get league data when first loading page
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