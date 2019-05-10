<html>
<head>
<div id = "head">
    <?php
    include 'header.php';?>
    
  </div>
<style>
body{padding-top:30px;}

.glyphicon {  padding-top: 70px;margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}</style>
<!------ Include the above in your HEAD tag ---------->
</head>
<div style = "padding-top:70px;"class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div style = "padding-left:200px;"class="well well-sm">
                <div class="row">
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4> <!---insert login---></h4>
                       
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i> <!--- insert mail --->
                            <br />
                            <i class="glyphicon glyphicon-globe"></i>
                            <a><!----type o account--></a>
                            <br />
                        </p>
                        <img src="styles/uknown.png" width = 100; height = 100; style = "padding-bottom:20px;"id="icon" />
                       <div style = "padding-bottom:20px;"class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Delete your account!
                                </button>
                        </div>
                        <div class = "changeSubscription">
                            Change Subscription Type: <select id = "subscription"class="fadeIn fourth">
                                <option value="Bronze">Bronze</option>
                                <option value="Gold">Gold</option>
                                <option value="Plat">Premium Plus Platinium</option>
                                </select>
                                <button type="button" class="btn btn-primary" id = "confirmChange">
                                Confirm Subscription Change
                                </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</html>