<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href='styles/stats.css'>
    <script type="text/javascript" src="js/stats.js"></script>
</head>

<body>
    <div class="container" id="listCont">
        <div class="row">
        <ul class='list-group list-group-horizontal' id='list-tab' role='tablist'>
          <a class="list-group-item list-group-item-action active" id="list-leagues-list" data-toggle="list" href="#list-leagues" role="tab" aria-controls="leagues">Leagues</a>
          <a class="list-group-item list-group-item-action" id="list-teams-list" data-toggle="list" href="#list-teams" role="tab" aria-controls="teams">Teams</a>
          <a class="list-group-item list-group-item-action" id="list-players-list" data-toggle="list" href="#list-players" role="tab" aria-controls="players">Players</a>
        </ul>
        </div>
        <div class="row" id='tableRow'>
            
        </div>
    </div>
    
    
    
</body>


</html>