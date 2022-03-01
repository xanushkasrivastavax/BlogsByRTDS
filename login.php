<?php
require('db.php');
require('functions.php');
$msg = " ";
$email = "";
$password = "";
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
    header('location:index.php');
}
if (isset($_POST['submit'])) {
    $email = get_safe_value($con, $_POST['email']);
    $password = get_safe_value($con, $_POST['password']);
    $sql = "select * from `users` where email = '$email'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    // echo "$res";
  
        while ($row = mysqli_fetch_assoc($res)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['USER_LOGIN'] = 'yes';
                $_SESSION['USER_USERNAME'] = $email;
                $sql = "update `users` set status = '1' where email = '$email'";
                mysqli_query($con, $sql);
                header('location:index.php');
            }
       
   else {
        $msg = "Please Enter Correct login details ";
    }
  }
} 

?>
<!DOCTYPE html>
<html>

<head>
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

<body>
    <div style="text-align: center;color:#04AA6D"><?php if (isset($_GET['Message'])) {
                                                        echo $_GET['Message'];
                                                    } ?></div>
    <h2 style="text-align: center;">Welcome Back!</h2>
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
              <h3>Sign In to <strong>Blogs by RTDS</strong></h3>
              <p class="mb-4">Write stories, look at stories, talk about stuff, find your people.</p>
            </div>
    <form method="post">
        <div class="container">
        <div class="form-group first">
            <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" class="form-control" value="<?php echo $email ?>" required>
                                                  </div>
                                                  <div class="form-group last mb-4">                                      
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" class="form-control" value="<?php echo $password ?>"
                required>
                                                  </div>
             <div class="d-flex">
            <button type="submit" name="submit" class="btn text-white btn-block btn-primary">Login</button>
            <div style="text-align"><?php echo $msg; ?></div>
                                                  </div>
        </div>
        <style>
                .btn{
                  background-color: #2CB225;
                  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
                }
                </style>

        <div class="d-block text-left mt-3" >
            <span style="padding-left: 23%;">Register Yourself <a href="register.php">sign up</a></span>
            <span class="psw"><a href="index.php">Back?</a></span>
        </div>
    </form>

</body>

</html>