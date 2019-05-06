<?php
require_once 'connection.php';

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
        switch($_GET["dataRequested"]){
          case 'leagues':
            get_leagues();
            break;
          default:
            break;
        }
       

    }
    
    function get_leagues(){
        /*
        * Database section
        */
        // Setup to exception on errors (will go to php_errors.log)
        try{
          $dbConn = get_database_connection(); 
          // Compose the SQL statement
          $sql = " SELECT * FROM league WHERE 1";
          
          // Prepare the statement
          $stmt = $dbConn -> prepare ($sql);
          
          // Execute the statement, passing in array of parameters
          $stmt -> execute ();
          
          // Process the results if there are any
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
          echo('<table class="table table-striped table-dark">');
          echo('<thead><tr><th scope="col">Name</th>');
          echo('<th scope="col">Nation</th>');
          echo('<th scope="col">Seasons</th>');
          echo('<th scope="col">First Season</th>');
          echo('<th scope="col">Last Season</th></tr></thead><tbody>');
          foreach($rows as $row){
            echo('<tr><th scope="row">'.$row["name"].'</th>
            <td>'.$row["nation"].'</td>
            <td>'.$row["seasons_available"].'</td>
            <td>'.$row["first_season"].'</td>
            <td>'.$row["most_recent_season"].'</td></tr>');
           }
          echo('</tbody></table>');
          

        }catch (PDOException $ex) {
        switch ($ex->getCode()) {
          case "23000":
            echo json_encode(array(
              "success" => false, 
              "message"=> "email taken, try another",
              "details" => $ex->getMessage()));
            break;
          default:
            echo json_encode(array(
              "success" => false, 
              "message"=> $ex->getMessage(),
              "details" => $ex->getMessage()));
            break;
        }
        }
    }

php?>