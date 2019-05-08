<!DOCTYPE html>
<html>

<head>
     <?php
        include 'header.php';
     ?>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href='styles/stats.css'>
    <script type="text/javascript" src="js/stats.js"></script>
</head>

<body>
    <div class="container" id="listCont">
        <div class="row">
        <h3>Select Data:</h3>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" id="queryLeagues">Leagues</a>
            <a class="dropdown-item" id="queryTeams">Teams</a>
            <a class="dropdown-item" id="queryPlayers">Players</a>
          </div>
        </div>
        </div>
        <div clas="row">
            <div class="column" id="picker"></div>
            <button class="btn btn-primary" id="viewLeagues">View League(s)</button>
        </div>
        <div class="row" id="leagueTableRow"></div>
        <div class="row" id='tableRow'></div>
    </div>
    
    

</body>

<footer class="container">
      <?php
        include 'footer.php';
        ?>
</footer>

</html>