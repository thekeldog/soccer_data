$(document).ready(function(){
   
   $("#deleteAccount").click(function(){
      console.log('deleting account'); 
      
      let userName = $('#login').val();
      let userPassword = $('#password').val();
      
      console.log(userName + " " + userPassword)
      
       $.ajax({
                type: "POST",
                url: "api/userProfile.php",
                dataType: "json",
                data: {
                    "deleteUser": true,
                },
                success: function(data) {
                    if(data['success'] === true){
                        console.log("you logged in you savage!")
                        window.location.href = 'index.php'
                    }else{
                        console.log("you messed something up, bro")
                    }

                },
                error: function(data){
                  console.log("that didn't go well");  
                },
                complete: function(data, status) { //optional, used for debugging purposes
                    //console.log(status);
                }
            });
      
   });
   $("#confirmChange").click(function(){
      console.log('changed subscription'); 
      
      let subscription = $('#subscription :selected').val();
      let userPassword = $('#password').val();
      
      
       $.ajax({
                type: "POST",
                url: "api/userProfile.php",
                dataType: "json",
                data: {
                    "changeSubscription": subscription,
                },
                success: function(data) {
                    if(data['success'] === true){
                        console.log("you logged in you savage!")
                        window.location.href = 'index.php'
                    }else{
                        console.log("you messed something up, bro")
                    }

                },
                error: function(data){
                  console.log("that didn't go well");  
                },
                complete: function(data, status) { //optional, used for debugging purposes
                    //console.log(status);
                }
            });
      
   });
    
});