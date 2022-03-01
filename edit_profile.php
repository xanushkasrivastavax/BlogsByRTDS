<?php
require('db.php');
require('functions.php');
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
    $user_email = $_SESSION['USER_USERNAME'];
    $sql = "select * from `users` where email='$user_email' ";
    $res = mysqli_fetch_assoc(mysqli_query($connection, $sql));
    $oldEmail = $res['email'];
    if (isset($_POST['save'])) {
        $id = $res['id'];
        $name = get_safe_value($connection, $_POST['name']);
        $email = get_safe_value($connection, $_POST['email']);
        $phone = get_safe_value($connection, $_POST['phone']);
        $password = get_safe_value($connection, $_POST['password']);		
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);		
        $query = "update users set name = '$name',phone = '$phone',email = '$email',password = '$password' where id =$id";
        mysqli_query($connection, $query);
        if ($email != $oldEmail) {
          $sql = "update `users` set status = 0 where email = '$username'";
          $data = "";
          mysqli_query($connection, $sql);
            header('location:logout.php?Message=' . $msg);
        } else {
            $msg = urldecode("Profile Updated Successfully");
            header('location:edit_profile.php?Message=' . $msg);
        }
    } elseif (isset($_POST['cancel'])) {
        header('location:blog.php');
    }
} else {
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Importing Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Font Awesome link  to add Social media logo-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Blogs by RTDS</title>
	<link rel="icon" type="favicon.ico" href="favicon.ico">

</head>
<style>
body {
	background-color: #ffffff;
}
p {
  font-family: 'Roboto',sans-serif;
	color: #000000;
	font-weight: 300;
}
.h3{
   font-family:'Roboto', sans-serif;
}

a {
	transition: .3s all ease;
	&:hover {
		text-decoration: none;
	}
}
.content {
	padding: 7rem 0;
}


.content {
	.bg {
		@include media-breakpoint-down(md) {
			height: 500px;
		}
	}
	.contents, .bg {
		width: 50%;
		@include media-breakpoint-down(lg) {
			width: 100%;
		}
		.form-group	{
			position: relative;
			label {
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
				transition: .3s all ease;
			}
			
			input {
				background: transparent;
				border-bottom: 1px solid #ccc;
			}

			&.first {
				border-top-left-radius: 7px;
				border-top-right-radius: 7px;
			}
			&.last {
				border-bottom: 1px solid #efefef;
				border-bottom-left-radius: 7px;
				border-bottom-right-radius: 7px;
			}
			label {
				font-size: 12px;
				display: block;
				margin-bottom: 0;
				color: #000000;
			}
			&.focus {
				background: $white;
			}
			&.field--not-empty {
				label {
					margin-top: -25px;
				}
			}
		}
		.form-control {
			border: none;
			padding: 0;
			font-size: 20px;
			border-radius: 0;
			&:active, &:focus {
				outline: none;
				box-shadow: none;
			}
		}
	}
	.bg {
		background-size: cover;
		background-position: center;
	}
	a {
		color: #888;
		text-decoration: underline;
	}
	.btn {
		height: 54px;
		padding-left: 30px;
		padding-right: 30px;
	}
	.forgot-pass {
		position: relative;
		top: 2px;
		font-size: 14px;
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
<body>
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="assets/img/bg.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <img class="mb-4" src="assets/img/rtdslogo.png" alt="" width="72" height="57">
              <h3>Your Profile on <strong>Blogs by RTDS</strong></h3>
              <p class="mb-4">Write stories, look at stories, talk about stuff, find your people.</p>
            </div>
    <h4 class="text-align">Edit your Profile</h4>
  
        <?php if (isset($_GET['Message'])) {
            echo $_GET['Message'];
        } ?></h3>
    <form method="post">
        <div class="container">
        <div class="form-group first">
            <label><b>Name</b></label>
            <input type="text" name="name" class="form-control" value="<?php echo $res['name'] ?>" required>
      </div>
      <div class="form-group first">
            <label><b>Email</b></label>
            <input type="text" name="email" class="form-control" value="<?php echo $res['email'] ?>" required>
      </div>
      <div class="form-group first">
            <label><b>Phone</b></label>
            <input type="text" name="phone" class="form-control" value="<?php echo $res['phone'] ?>" required>
      </div>
			<div class="form-group last mb-4">
            <label><b>Password</b></label>
            <input type="password" name="password" class="form-control" value="<?php echo $res['password'] ?>" required>
      </div>
            

            <button type="submit" name="save" class="btn btn-light btn-sm">Edit</button>
            <button type="submit" name="cancel" class="btn btn-danger btn-sm ml-50">Cancel</button>
        </div>
    </form>

</body>

</html>