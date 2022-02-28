<?php
require('db.php');
require('functions.php');
// $session = session_id();
// $time = time();
// $time_out_in_seconds = 300;
// $time_out = $time - $time_out_in_seconds;
// $sql= "SELCT * FROM users_online WHERE $session = '$session' ";
// $send_query = mysqli_query($con, $sql);
// $count = mysqli_num_rows($send_query);
// if($count == NULL)
// {
//   mysqli_query($con,"INSERT INTO users_online(session,time) VALUES('$session','$time')");
// }
// else{
//   mysqli_query($con,"UPDATE users_online SET time ='$time' WHERE $session='$session'");
// }
// $user_online_query =  mysqli_query($con,"SELECT * FROM users_online WHERE time >'$time_out'");
// $count_user = mysqli_num_rows($user_online_query);


if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'status') {
      $time = time();
      $time_out_in_seconds=300;
      $time_out=$time - $time_out_in_seconds;
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
        $update_status_sql = "update `users` set status='$status' where id='$id'";
        mysqli_query($con, $update_status_sql);
    }
}
$res = "";
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {

    $sql = "select users.id, users.name,users.email,users.phone,users.status from `users`";

    $res = mysqli_query($con, $sql);
} else {
    header('location:login.php');
    die();
}


?>
<DOCTYPE HTML>
    <html>
    <>
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
        <title>Blogs by RTDS</title>
        <style>
        th,
        td {
            text-align: left;
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        span.psw {
            float: right;

        }
        </style>
    </head>
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
            <a class="nav-link active" aria-current="page" href="blog.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          
          <!-- <li class="nav-item">
            <a class="nav-link"> Users Online :<?php echo $count_user; ?></a>
          </li> -->
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

    <body>
    <hr class="featurette-divider">
        <form method="POST">
            <div>
                <h1 style="text-align: center;"><b>Number of Users online</b></h1>
            </div>

            <div style="overflow-x:auto;">
                <table
                    style="border:1px solid black;margin-left: auto; margin-right:auto;border-collapse: separate;border-spacing: 0;width:90%">
                    <thead>
                        <tr>
                           
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                           
                            <td>
                                <?php
                                    if ($row['status'] == 1) {
                                       
                                        echo "<p style='color:green;'>Online</p>";
                                    } else {
                                        
                                        echo "<p style='color:red;'>Offline</p>";
                                    } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </body>

    </html>