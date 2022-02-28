<?php
require('db.php');
require('functions.php');
global $con;
$session = session_id();
$time = time();
$time_out_in_seconds = 300;
$time_out = $time - $time_out_in_seconds;
$sql= "SELECT * FROM users_online WHERE session = '$session'";
$send_query = mysqli_query($con, $sql);
// die("QUERY FAILED". $send_query);
$count = mysqli_num_rows($send_query);
if($count == NULL)
{
  mysqli_query($con,"INSERT INTO users_online(session,time) VALUES('$session','$time')");
}
else{
  mysqli_query($con,"UPDATE users_online SET time ='$time' WHERE $session='$session'");
}
$users_online_query =  mysqli_query($con,"SELECT * FROM users_online WHERE time >'$time_out'");
$count_user = mysqli_num_rows($users_online_query);
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blogs by RTDS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!--Favicon-->
   <link rel="icon" type="favicon.ico" href="favicon.ico">
   <link rel="stylesheet" href="carousel.css">
   <!-- Bootstrap Core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!--Google Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@200&family=Roboto:wght@300&display=swap" rel="stylesheet">
  </head>
  <body>
    <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">

  <body>
    <h1> Users Online :<?php echo $count_user; ?></h1>