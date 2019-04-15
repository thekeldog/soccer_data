<?php

session_start();
    // SQL Credentials 'mysql://sf1qzp17uzk5ms6f:p6n7qso52n2og7b7@bfjrxdpxrza9qllq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/lbkixx7usdyvo8hh'


    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case "GET":
        onGet();
        break;
      case 'POST':
        // Get the body json that was sent
        $rawJsonString = file_get_contents("php://input");

        //var_dump($rawJsonString);

        // Make it a associative array (true, second param)
        $jsonData = json_decode($rawJsonString, true);

        // TODO: do stuff to get the $results which is an associative array
        $results = array();

        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");

        // Sending back down as JSON
        echo json_encode($results);

        break;
      case 'PUT':
        // TODO: Access-Control-Allow-Origin
        http_response_code(401);
        echo "Not Supported";
        break;
      case 'DELETE':
        // TODO: Access-Control-Allow-Origin
        http_response_code(401);
        break;
    }
    
    function onGet(){
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");
        // Get the body json that was sent
        $rawJsonString = file_get_contents("php://input");
        // Make it a associative array (true, second param)
        $jsonData = json_decode($rawJsonString, true);
        
        /*
        * Database section
        */
        $connUrl = getenv('JAWSDB_MARIA_URL');
        //$connUrl = "mysql://j4dca6gxki2p2a7s:puwg05o53pi5g1r0@p2d0untihotgr5f6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/hllilhmqaqrauk1m";
        $hasConnUrl = !empty($connUrl);
        $connParts = null;
        if ($hasConnUrl) {
            $connParts = parse_url($connUrl);
        }
        //var_dump($hasConnUrl);
        $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
        $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'crime_tips';
        $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
        $password = $hasConnUrl ? $connParts['pass'] : '';
        
        $dbConn =  new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // Setup to exception on errors (will go to php_errors.log)
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Compose the SQL statement
        $sql = " SELECT * FROM leagues WHERE 1";
        
        // Prepare the statement
        $stmt = $dbConn -> prepare ($sql);
        
        // Execute the statement, passing in array of parameters
        $stmt -> execute (  array ()  );
        
        // Process the results if there are any
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
        
        
        
        //echo ($jsonData);
         // TODO: do stuff to get the $results which is an associative array
        //$results = array();
        //array_push($results, "Passed from onGet Method in my php");

        // Sending back down as JSON
        //echo json_encode($results);
    
    }

php?>