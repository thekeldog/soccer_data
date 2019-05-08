<head>
<link href="styles/logstyles.css" rel="stylesheet" id="bootstrap-css">
  <div id = "head">
    <?php
    include 'header.php';?>
  </div>
  <script src="js/login.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
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
      
    </form>
    <button id ="loginButton" class="btn btn-primary" value="Log In">Log In</button>

  </div>
</div>