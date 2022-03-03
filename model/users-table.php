<?php 
require_once('db.php');

$connection;

function createUserTable(){
  global $connection;
  $databaseConnection = connectDatabase();
  if($databaseConnection[0] == TRUE){
    $connection = $databaseConnection[1];
  }
  else {
    $returnValue = [FALSE];
    return $returnValue;
  }
  
  $sql = "CREATE TABLE IF NOT EXISTS users (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status tinyint(1) NOT NULL
    )";
    
    if($connection -> query($sql) == TRUE)
    {
    
     $returnValue = TRUE;
     return $returnValue; 
    }
    else{
      $returnValue = FALSE;
      return $returnValue;
    }
}

function InsertInUsersTable($name,$email,$phone,$password)
{
 
  global $connection;
  $tableCreation = createUserTable();
  if($tableCreation === FALSE)
  {
    $returnValue = [FALSE];
    return $returnValue;    
  }

  $sql = "INSERT INTO users (name, email, phone, password,status) VALUES ('$name', '$email','$phone', '$password',0)";
  $result = $connection->query($sql);
  $returnValue = [TRUE, $result];
  return $returnValue;


}

?>