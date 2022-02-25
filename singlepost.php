<?php
   require('db.php');
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
    <!-- Navigation-->
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
    
<header>
  <style>
    .navbar {
      font-family: 'Roboto', sans-serif;
font-family: 'Roboto Serif', sans-serif;
    }
    </style>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container-fluid">
    <img class="mb-4 px-2" src="rtdslogo.png" alt="" width="72" height="57">
      <a class="navbar-brand" href="#"><strong>Blogs by RTDS<strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="myblog.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin">Admin</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
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
  <hr class="featurette-divider">
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                           
                 <?php
                  
                  if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
                    $data = $_SESSION['USER_USERNAME'];
    $id_query = "select id from `users` where email='$data' ";
    $res = mysqli_query($con, $id_query);
    $set = mysqli_fetch_assoc($res);
    $id = $set['id'];
    $blog_id = 
                    $sql = "select * from `blogs` where user_id = $id and blog_id ";
                    $res = mysqli_query($con, $sql);
                } else {
                    header('location:login.php');
                }

                   $select_all_posts_query= mysqli_query($connection,$sql);
                   while($row = mysqli_fetch_assoc($select_all_posts_query)){
                 //return next row in associative array
                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_date= $row['post_date'];
                    $post_image= $row['post_image'];
                    $post_content= $row['post_content'];
                      ?>
                       <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               

           
            <?php }?>
            
        <!-- Blog Comments -->
        <?php 
             if(isset($_POST['create_comment']))
             {
              $the_post_id = $_GET['p_id'];
              $comment_author = $_POST['comment_author'];
              $comment_email = $_POST['comment_email'];
              $comment_content = $_POST['comment_content'];

              $query = "INSERT INTO comments (comment_post_id,comment_author, comment_email,comment_content, comment_status, comment_date)";
              $query .= "VALUES ($the_post_id,'{$comment_author}', '{$comment_email}','{$comment_content}', 'unapproved' , now() )";
              $create_comment_query= mysqli_query($connection,$query);
              if(!$create_comment_query){
                die("QUERY FAILED". mysqli_error($connection));
              }
             }
             $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
             $query .= "WHERE post_id = $the_post_id ";
             $update_comment_count =  mysqli_query($connection,$query);
        ?>
                <!-- Comments Form -->
                <div class="well">



<h4>Leave a Comment:</h4>
<form action="#" method="post" role="form">

    <div class="form-group">
        <label for="Author">Author</label>
        <input type="text" name="comment_author" class="form-control" name="comment_author">
    </div>

    <div class="form-group">
        <label for="Author">Email</label>
        <input type="email" name="comment_email" class="form-control" name="comment_email">
    </div>

    <div class="form-group">
        <label for="comment">Your Comment</label>
        <textarea name="comment_content" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
</form>
</div>

                <hr>

                <!-- Posted Comments -->
                <?php 


$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC ";
$select_comment_query = mysqli_query($connection, $query);
if(!$select_comment_query) {

    die('Query Failed' . mysqli_error($connection));
 }
while ($row = mysqli_fetch_array($select_comment_query)) {
$comment_date   = $row['comment_date']; 
$comment_content= $row['comment_content'];
$comment_author = $row['comment_author'];
    
    ?>
    
    
               <!-- Comment -->
    <div class="media">
         
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $comment_author;   ?>
                <small><?php echo $comment_date;   ?></small>
            </h4>
            
            <?php echo $comment_content;   ?>

        </div>
    </div>

    
  <?php } ?>

              

                
        </div>
                  

            <!-- Blog Sidebar Widgets Column -->
            <?php 
       include "sidebar.php";
      ?>

        </div>
        <!-- /.row -->

        <hr>
        <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
