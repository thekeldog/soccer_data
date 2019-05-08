$(document).ready(function(){
 
    $('#signupButton').click(function(){
        
       console.log("signup clicked")
        
        let userName = $('#userName').val();
        let userPassword = $('#password').val();
        let confirmPassword = $('#password2').val();
        
        console.log(userName + ' ' + userPassword+' '+confirmPassword);
        /*
        if(userName.length === 0){
            $('#failMessage').html('Please Provide a Username')
            $('#failMessage').css('color','red')
            $('#failMessage').css('font-size','15px')
            $('#failMessage').show()  
            return;
        }
        if(userPassword.length === 0){
            $('#failMessage').html('Please Provide a Password')
            $('#failMessage').css('color','red')
            $('#failMessage').css('font-size','15px')
            $('#failMessage').show()  
            return;
        }
        if(confirmPassword.length === 0){
            $('#failMessage').html('Please Confirm Password')
            $('#failMessage').css('color','red')
            $('#failMessage').css('font-size','15px')
            $('#failMessage').show()  
            return;
        }
        
        */
        
        $.ajax({
                type: "POST",
                url: "api/signUp.php",
                dataType: "json",
                data: {
                    "userName": userName,
                    "password": [userPassword, confirmPassword],
                    "subscription": $("#subscription :selected").val()
                },
                success: function(data) {
                    if(data['success'] === true){
                        //console.log(data);
                        window.location.href = 'index.php';
                    }else{
                        /*
                        $('#failMessage').html(data['message'])
                        $('#failMessage').css('color','red')
                        $('#failMessage').css('font-size','15px')
                        $('#failMessage').show()  */
                    }
                    
                },
                error: function(data){
                
                }, 
                complete: function(data, status) { //optional, used for debugging purposes
                    //console.log(status);
                }
        });
        return false;
        
    })
    
});