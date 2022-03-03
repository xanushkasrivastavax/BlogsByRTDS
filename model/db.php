<?php 
function connectDatabase()
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "web";

  $connection = new mysqli($servername,$username,$password,$databasename);

  $sql = "CREATE DATABASE IF NOT EXISTS $databasename";

  if($connection -> query($sql) === TRUE)
  {
    $connection = new mysqli($servername,$username,$password,$databasename);
    $returnValue = [TRUE,$connection];
    return $returnValue;
  }
  else{
    $returnValue = FALSE;
    return $returnValue;
  }


}

?>