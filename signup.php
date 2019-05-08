<html>
<head>
<link href="styles/logstyles.css" rel="stylesheet" id="bootstrap-css">
  <div id = "head">
    <?php
    include 'header.php';?>
    
  </div>
  <script src = "js/signup.js" ></script>
<title>Sign Up</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <img src="styles/uknown.png" id="icon" />
    </div>
    <form>
      <input type="text" id="userName" class="fadeIn second" name="login" placeholder="Username">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">
      <input type="text" id="password2" class="fadeIn third" name="login" placeholder="Confirm Password">
        Subscription: <select id = "subscription"class="fadeIn fourth">
        <option value="Bronze">Bronze</option>
        <option value="Gold">Gold</option>
        <option value="Plat">Premium Plus Platinium</option>
        </select>
      <br>
      
      <br>
      <div id="error"> </div>
    </form>
    <button id ="signupButton" class="btn btn-primary" value="Sign Up">Sign Up</button>
  </div>
</div>


</body>

</html>