<?php
require('db.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
    $sql = "select * from `blogs` ";
    $res = mysqli_query($con, $sql);
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
    
<header>
  <style>
    .navbar {
      font-family: 'Roboto', sans-serif;
font-family: 'Roboto Serif', sans-serif;
    }
    </style>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container-fluid">
    <img class="mb-4 px-2" src="assets/img/rtdslogo.png" alt="" width="72" height="57">
      <a class="navbar-brand" href="#"><strong>Blogs by RTDS<strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="myblogs.php">My Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="edit_profile.php">Edit Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="user_online.php">Users online</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
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
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="assets/img/banner1.png" class="d-block w-100" alt="...">
        

        <div class="container">
          <div class="carousel-caption text-start">
            <h1 style="color: black;">Publish your passion today</h1>
            <p style="color: black;">Create a unique and beautiful blog. It’s easy and free. Express your creativity.</p>
            <p ><a class="btn btn-lg btn-primary" href="register.php">Register today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        
        <img src="assets/img/banner2.png" class="d-block w-100" alt="...">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Connect to like minded people</h1>
            <p>Blogs are the best way to communicate in truest form</br> 
            and reflection of who we are as a person.</p>
            <p><a class="btn btn-lg btn-primary" href="login.php">Log In</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        
        <img src="https://www.myrealdata.in/wp-content/uploads/2020/09/about-rtds-company.jpg" class="d-block w-100" alt="...">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>About Real Time Data Services</h1>
            <p>Real Time Data Services (RTDS) is a group of companies</br> 
            thriving in the domain of global information technology;</br>
             we serve clients in the field of cloud computing and communication.</br>
              The company empowers businesses across the globe with technology that </br>
               takes care of their various operational needs.</p>
            <p><a class="btn btn-lg btn-primary" href="https://www.myrealdata.in/">Visit company website</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <style>
    .btn{
      color: white;
    }
    </style>
    <hr class="featurette-divider">
    <div class="container mt-5">
   
    <div class="container mt-5">
  <h3> Welcome <?php echo $_SESSION["USER_USERNAME"]?> </h3>
  </div>
    <div class="text-center mb-5">
      <a href="create.php" class="btn btn-outline-dark">Create a new post</a>
    </div>
 
    
  <div class="row mb-5">
  <?php
                $i = 1;
                while ($q = mysqli_fetch_assoc($res)) { ?>
      <div class="col-4 d-flex justify-content-center align-items-center">
        <div class="card text-black bg-light mt-5">
         <div class="card-body" style="width: 18rem">
         <h5 class="card-title"><?php echo $q['blog_title']; ?></h5>
         <p class="card-text"><?php echo $q['blog_content']; ?></p>
         <!-- <a href="view.php?id=<?php echo $q['id']?>" class="btn btn-dark mb-3">Read More <span class="text-danger">&rarr;</span></a> -->
         <div class="text-align">
                    <a href="comments.php?id=<?php echo $q['id'] ?>" style="text-decoration: none;color:black">
                        <span class="btn btn-dark mb-3">COMMENTS</span></a><br>
                </div>
         </div>
        </div>
      </div>
      <?php }?>
    </div>
    </div>

    <hr class="featurette-divider">
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
    <script src="" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>