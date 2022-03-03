

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="favicon.ico" href="favicon.ico">
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
<body>

    <style>
.fa {
  padding: 5px;
  font-size: 15px;
  width: 35px;
  text-align: center;
  text-decoration: none;
  margin: 2px 2px;
  border-radius: 10%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}
</style>
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
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="../../assets/img/bg.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <img class="mb-4" src="../../assets/img/rtdslogo.png" alt="" width="72" height="57">
              <h3>Register to <strong>Blogs by RTDS</strong></h3>
              <p class="mb-4">Write stories, look at stories, talk about stuff, find your people.</p>
            </div>
            <form method="post" action="../../controller/register.php">
            <div class="form-group first">
                <label for="name"><b>NAME</b>
                    <p id="fname"></p>
                </label>
                <input type="text" placeholder="Enter Your Name" class="form-control" name="name" required>
                </div>
                <div class="form-group first">
                <label><b>EMAIL</b>
                    <p id="femail"></p>
                </label>
                <input type="text" placeholder="Enter Email as Username" class="form-control" name="email" 
                    required>
</div>
                <div class="form-group first">
                  <label><b>PHONE NUMBER</b>
                    <p id="fphone"></p>
                </label>
                <input type="text" placeholder="Enter Phone Number" name="phone" class="form-control"  required>
</div>
 
            
<div class="form-group last mb-4">
                <label><b>PASSWORD</b>
                    <p id="psw">
                    <p>
                </label>
                <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
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
                <div class="d-flex mb-5">
                <button type="submit" class="btn btn-primary" name="save">Register</button> </div>     

              
                <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div>
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  <script>
        function clearerror() {
            document.getElementById('fname').innerHTML = "";
            document.getElementById('femail').innerHTML = "";
            document.getElementById('fphone').innerHTML = "";
            document.getElementById('psw').innerHTML = "";
        }

        function seterror(id, error) {
            document.getElementById(id).innerHTML = error;
        }

        function validation() {
            clearerror();
            let validate = true;
            let name = document.forms['form1']['name'].value;
            if (name.length < 4) {
                seterror('fname', 'Invalid name');
                validate = false;
            }
            let email = document.forms['form1']['email'].value;
            if (email.length < 10) {
                seterror('femail', 'Invalid email');
                validate = false;
            }
            let phone = document.forms['form1']['phone'].value;
            if (phone.length != 10) {
                seterror('fphone', 'Invalid phone number');
                validate = false;
            }
            let password = document.forms['form1']['password'].value;
            if (password.length < 8) {
                seterror('psw', 'Required minimum 8 characters');
                validate = false;
            }
            return validate;
          }
        </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>