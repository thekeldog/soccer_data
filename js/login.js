$(document).ready(function(){
   
   $("#loginButton").click(function(){
      console.log('in log-in onClick'); 
      
      let userName = $('#login').val();
      let userPassword = $('#password').val();
      
      console.log(userName + " " + userPassword)
      
       $.ajax({
                type: "GET",
                url: "api/userLogin.php",
                dataType: "json",
                data: {
                    "userName": userName,
                    "password": userPassword
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
   
   $('#registerButton').click(function(){
      window.location.href = 'register.php';
   });
    
});