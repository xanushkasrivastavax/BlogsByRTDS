<?php
require('db.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
    if (isset($_GET["id"])) {
        $data = $_GET['id'];
        $blog_query = "select * from blogs where id= '$data' ";
        $result = mysqli_fetch_assoc(mysqli_query($con, $blog_query));
        $sql = "select * from comments where blog_id = '$data'";
        $res = mysqli_query($con, $sql);
        if (isset($_POST['save'])) {
            $user_email = $_SESSION['USER_USERNAME'];
            $user_id_query = "select id from users where email= '$user_email' ";
            $fetch_id = mysqli_fetch_assoc(mysqli_query($con, $user_id_query));
            $user_id = $fetch_id['id'];
            $comment_rand=mysqli_fetch_array(mysqli_query($con, $sql));
            $comment_date=$comment_rand['comment_date'];
            $comment = $_POST['comment_content'];
            $query = "insert into `comments`(user_id,blog_id,comment_content,comment_date) values('$user_id','$data','$comment',now())";
            mysqli_query($con, $query);
            header('location:blog.php');
        }
    } else {
        header('location:blog.php');
    }
} else {
    header('location:login.php');
}

?>

<!DOCTYPE HTML>
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
          <li class="nav-item">
            <a class="nav-link disabled">Dashboard</a>
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
    <form method="POST" action="">
    <div class="container mt-5">
          
            <hr>
            <div  class="bg-light p-5 rounded-lg text-dark border-dark text-center">
            <h2>

                <b> <?php echo $result['blog_title'] ?><br> </b>
            </h2>
            </div>
            <hr>
            <p>
                <?php echo $result['blog_content'] ?><br>
            </p>
            <hr>
            <h4 class="mt-3"><b>Leave a comment</b></label></h4>
            <div class="form-group mb-3">
            <input type="text" name="comment_content" placeholder="Add your Comment"
                style="text-align:center;width: 60%; height:40px" required>
                </div>
            <button type="submit" name="save"
            class="btn btn-primary">Submit</button>
            
        </div>
        <hr>
            <h3 class="text-center">Comment Section</h3>
            <div class="media">
           
                <?php
                $lastcol = 0;
                $i = 0;
                while ($rows = mysqli_fetch_assoc($res)) {
                    
                ?>
              
              <div class="media-body">
                    
                        <?php
                            $id = $rows['user_id'];
                            $name_query = "select name from users where id = '$id'";
                            $name = mysqli_fetch_assoc(mysqli_query($con, $name_query));
                            echo "<h5 class='media-heading'><b>" . $name['name'] . "</b><h5>";
                            // echo "<small>" .  $comment_date . "</small>" ;  
                            ?>
                   <span>
                            <?php echo $rows['comment_content']; ?></span>
                  
                <?php } ?>
            </tbody>
        </table>
    </form>
</body>

</html>