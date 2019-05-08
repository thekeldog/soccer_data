<?php
function get_query_with_params($input, $params){
    global $log;
    $connUrl = getenv('JAWSDB_MARIA_URL');
    $hasConnUrl = !empty($connUrl);
    
    $connParts = null;
    if ($hasConnUrl) {
        $connParts = parse_url($connUrl);
    }
    
    //var_dump($hasConnUrl);
    $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
    $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'soccer_data';
    $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    $password = $hasConnUrl ? $connParts['pass'] : 'cywudged5';
    $opts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,];
    
    $pdo =  new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $opts);
    
    $sql = $input;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
    
}

function get_query_without_params($input){
    global $log;
    $connUrl = getenv('JAWSDB_MARIA_URL');
    $hasConnUrl = !empty($connUrl);
    
    $connParts = null;
    if ($hasConnUrl) {
        $connParts = parse_url($connUrl);
    }
    
    //var_dump($hasConnUrl);
    $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
    $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'soccer_data';
    $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
    $password = $hasConnUrl ? $connParts['pass'] : 'cywudged5';
    $opts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,];
    
    $pdo =  new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $opts);
    
    $sql = $input;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
    
}
session_start();
    // stack overflow random password generator. Credit: https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    
    
    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case "GET":
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");
        if(isset($_GET['league_slug'])){
            $sql = "SELECT * FROM league WHERE 1";
            $results = get_query_without_params($sql);
            #echo("start");
            #echo(json_encode($result));
            foreach($results as $result){
                echo("<option value=\"".$result['league_slug']."\">".$result['name']."</option>");
            }
        }
        if(isset($_GET['team'])){
            $sql = "SELECT * FROM team where league_slug = :league_slug";
            $namedParameters[':league_slug'] = $_GET['team'];
            $results = get_query_with_params($sql, $namedParameters);
            foreach($results as $result){
                echo("<option value=\"".$result['team_name']."\">".$result['team_name']."</option>");
            }
        }
        break;
        
      case "POST":
          break;


    }


?>