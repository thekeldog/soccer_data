<?php
session_start();
require_once 'connection.php';



  $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

  switch($httpMethod) {
    case "OPTIONS":
      // Allows anyone to hit your API, not just this c9 domain
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-Control-Max-Age: 3600");
      exit();
    case "GET":
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'POST':
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");

      //var_dump($rawJsonString);

      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);

      // First, validate email and password
      // On second thought, let you figure out email validation and do password confirmation

      if (!isset($_POST["password"])) {
       echo json_encode(array(
          "success" => false,
          "message" => "No password provided"));
        return;
      } 
      
      
      
      if (count($_POST["password"]) != 2) {
        echo json_encode(array(
          "success" => false,
          "message" => "No confirmation provided"));
        return;
      }      

      if ($_POST["password"][0] != $_POST["password"][1]) {
        echo json_encode(array(
          "success" => false,
          "message" => "Password and confirmation do not match"));
        return;
      }    
      
      $postedPassword = $_POST["password"][0];

      // Use BCrypt password hashing
      $options = [
          'cost' => 11,
      ];

      $hashedPassword = password_hash($postedPassword, PASSWORD_BCRYPT, $options);

      // TODO: do stuff to get the $results which is an associative array
     
      // Get Data from DB
      try {
        
        $dbConn = get_database_connection();
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
        $sql = "INSERT INTO user (username, password, subscription) " .
               "VALUES (:email, :hashedPassword, :subscription) ";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array (":email" => $_POST['userName'],
                              ":hashedPassword" => $hashedPassword,
                              ":subscription" => $_POST['subscription']));

        $_SESSION["email"] = $record["email"];
        $_SESSION["subscription"] = $_POST['subscription'];
        $_SESSION["isAdmin"] = false;
  
        // Sending back down as JSON
        echo json_encode(array("success" => true));
  
        } catch (PDOException $ex) {
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
?>