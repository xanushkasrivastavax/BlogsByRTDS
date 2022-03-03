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
  
  $sql = "CREATE TABLE IF NOT EXISTS 'users' (
    'id' int(11) NOT NULL AUTO_INCREMENT,
    'name' VARCHAR(255) NOT NULL,
    'email' VARCHAR(255) NOT NULL,
    'phone' VARCHAR(255) NOT NULL,
    'password' VARCHAR(255) NOT NULL,
    'status' tinyint(1) NOT NULL,
    PRIMARY KEY('id'),
    UNIQUE KEY 'phone' ('phone'),
    UNIQUE KEY 'email' ('email')
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

function getAllUsersData(){
  global $connection;
  $tableCreation = createUserTable();
  if($tableCreation === FALSE)
  {
    $returnValue = [FALSE];
    return $returnValue;    
  }
  
  $sql = "SELECT id,name, email, phone, password, status from 'users' order by id";

  $result = $connection->query($sql);
  $returnValue = [TRUE, $result];
  return $returnValue;
}

function getSpecificUserData($userfield, $userIdentifier){
  global $connection;
  $tableCreation = createUserTable();

  if($tableCreation === FALSE)
  {
    $returnValue = [FALSE];
    return $returnValue;
  }

  $sql = "SELECT id, name, email, phone, password, status FROM 'users' WHERE $userfield = $userIdentifier ORDER by id";

  $result = $connection->query($sql);

  $returnValue = [TRUE,$result];
  return $returnValue;

}

function getUserSpecificUserPasswordData($userfield, $userIdentifier){
  global $connection;

  $tableCreation = createUserTable();

  if($tableCreation === FALSE)
  {
    $returnValue = [FALSE];
    return $returnValue;
  }

  $sql = "SELECT id, password FROM 'users' WHERE $userfield = $userIdentifier ORDER by id";
  
  $result = $connection->query($sql);
  
  $returnValue = [TRUE, $result];
  return $returnValue;

}

function addSpecificUser($userfield, $userIdentifier){
  global $connection;

  $tableCreation = createUserTable();

  if($tableCreation == FALSE)
  {
    $returnValue = [FALSE];
    return $returnValue;
  }
  
  $name = "";
  $email = "";
  $phone = ""; 
  $address = "";
  $password = "";

  $sql = "INSERT INTO Users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$address','$password')";

  $result = $connection->query($sql);

  $returnValue = [TRUE, $result];
  return $returnValue;

} 

?>