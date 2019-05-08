<!DOCTYPE html>
<html>

<div class ="head">
     <?php
        include 'header.php';
     ?>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href='styles/stats.css'>
    <script type="text/javascript" src="js/stats.js"></script>
</div>
<div class="row">
<div class="container" id="mainContainer">
<body>
    <div class="container" id="listCont">
        <div class = "row">
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="media/f1.jpg" class="d-block w-500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h2>Statistics</h2>
                  <p>Query Available Leagues and Teams and see past and present League Tables</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="media/f2.jpg" class="d-block w-500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h2>Statistics</h2>
                  <p>Query Available Leagues and Teams and see past and present League Tables</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="media/f3.jpg" class="d-block w-500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h2>Statistics</h2>
                  <p>Query Available Leagues and Teams and see past and present League Tables</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>    
        </div>
        <!--
        <div class="row">
        
        <h3>Select Data:</h3>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" id="queryLeagues">Leagues</a>
            <a class="dropdown-item" id="queryTeams">Teams</a>
          </div>
        </div>
        </div>
        --->
        <div clas="row">
            <div class="column" id="picker"></div>
            <button class="btn btn-primary" id="viewLeagues">View League(s)</button>
        </div>
        <div class="row" id="leagueTableHeader"></div>
        <div class="row" id="leagueTableRow"></div>
        <div class="row" id='tableRow'></div>
    </div>
    
    

</body>
</div>
</div>
<footer class="container">
      <?php
        include 'footer.php';
        ?>
</footer>

</html>