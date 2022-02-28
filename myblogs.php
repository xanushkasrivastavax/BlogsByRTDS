<?php
require('db.php');
$msg = "";
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
    $data = $_SESSION['USER_USERNAME'];
    $id_query = "select id from `users` where email='$data' ";
    $res = mysqli_query($con, $id_query);
    $set = mysqli_fetch_assoc($res);
    $id = $set['id'];
    $sql = "select * from `blogs` where user_id = '$id' ";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) < 1) {
        $msg = "You Have Not Created Any Blog Till Now!";
    }
} else {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
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
   <!--Google Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@200&family=Roboto:wght@300&display=swap" rel="stylesheet">
  </head>
  <body>
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
     <style>
    .navbar {
      font-family: 'Roboto', sans-serif;
font-family: 'Roboto Serif', sans-serif;
    }
    </style>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light mb-5">
    <div class="container-fluid">
    <img class="mb-4 px-2" src="assets/img/rtdslogo.png" alt="" width="72" height="57">
      <a class="navbar-brand" href="#"><strong>Blogs by RTDS<strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="blog.php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
     
      </div>
    </div>
  </nav>
</header>

<main>
  <style>
    .btn{
      background-color: #2CB225;
    }
    h1{
      color: black;
    }
    p{
      color: black;
      font-weight: 100;
    }
    
    </style>
    <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <style>
      .mt-5 {
    margin-top: 6rem!important;
}
form{
  font-family: 'Roboto', sans-serif;
font-family: 'Roboto Serif', sans-serif;
}
      </style>

<body>
  <hr>
    <form method="POST" class="mt-5">
        <div class="container">
          <hr>
            <h3 class="text-center">My Blogs</h3>
            <hr>
            <?php
            echo "<h2>" . $msg . "</h2>";
            while ($row = mysqli_fetch_assoc($res)) { ?>
            <div  class="bg-light p-5 rounded-lg text-white border-dark text-center">
               <h1> <b><?php echo $row['blog_title']; ?><br></b>
            </h1>
            </div>
            <hr>
            <p class="mt-5 border-left border-dark pl-3">
                <?php echo $row['blog_content'] ?>
            </p>
            <br>
            <div style="text-align: right;">
                <a href="edit.php?body=<?php echo $row['id']; ?>" class="btn btn-primary ">Edit</a>
            </div>
            <div class="text-align">
                    <a href="comments.php?id=<?php echo $row['id'] ?>" style="text-decoration: none;color:black">
                        <span class="btn btn-primary  mb-3">COMMENTS</span></a><br>
                </div>
            <hr>
            <?php } ?>

            <hr>
        </div>
    </form>
</body>

</html>