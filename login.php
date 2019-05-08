<link href="styles/logstyles.css" rel="stylesheet" id="bootstrap-css">
  <div id = "head">
    <?php
    include 'header.php';?>
    
  </div>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <div>
    </div>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="styles/uknown.png" id="icon" />
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Username">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">
      <input type="submit" onclick="myFunction()"id = "loginButton"class="fadeIn fourth" value="Log In">
    </form>

   <script>
  function myFunction() {
  var sel = document.getElementById('login');
  var opt = sel.value;
  alert("Thank you for logging in, "+opt +"!");
  
}
</script>

  </div>
</div>