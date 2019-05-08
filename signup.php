<html>
<head>
<link href="styles/logstyles.css" rel="stylesheet" id="bootstrap-css">
  <div id = "head">
    <?php
    include 'header.php';?>
    
  </div>
<title>Sign Up</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <img src="styles/uknown.png" id="icon" />
    </div>
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Username">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">
      <input type="text" id="password2" class="fadeIn third" name="login" placeholder="Confirm Password">
        Subscription: <select id = "subscription"class="fadeIn fourth">
        <option value="Bronze">Bronze</option>
        <option value="Gold">Gold</option>
        <option value="Plat">Premium Plus Platinium</option>
        </select>
      <br>
      <input type="submit" onclick="myFunction()"id = "signupButton"class="fadeIn fourth" value="Sign Up">
      <br>
      <div id="error"> </div>
    </form>
  </div>
</div>
<script>
function myFunction() {
  var sel = document.getElementById('subscription');
  var opt = sel.options[sel.selectedIndex];
  var text = opt.text;
  alert("Thank you for signing up! Your plan is: " + text);
  
}
</script>
</body>

</html>