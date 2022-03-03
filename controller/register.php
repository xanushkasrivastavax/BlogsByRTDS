<?php
require('functions.php');
require('../model/users-table.php');
$msg = "";
$name = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$nameErr = $emailErr = $phoneErr = $addressErr = $passwordErr = "";

if (isset($_POST['save'])) {
    //  echo "ANUSHKA";
    echo $_POST["name"];
    #Name Validation
    if (empty($_POST["name"])) {
        // echo "ANUSHKA";
        $nameErr = "Name is required.<br/>";
    } else {
       
        if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["name"])) {
            $nameErr = "Only letters and white space allowed.<br/>";
        } else {
            $name = $_POST["name"];
        }
    }
    #Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.<br/>";
    } else {
        
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            
            $emailErr = "Invalid email format.<br/>";
        } else {
            
            $email = $_POST["email"];
            // if (mysqli_num_rows(mysqli_query($connection, "select * from users where email = '$email'")) > 0) {
            //     $emailErr = "Email Already Present.<br/>";
            // }
        }
    }
    #Phone Number Validation
    if (empty($_POST["phone"])) {

        $phoneErr = "Phone Number is required.<br/>";
    } else {
        
        if (!preg_match('/^[0-9]{10}+$/', $_POST["phone"])) {
          
            $phoneErr = "Invalid Phone Number.<br/>";
        } else {
          
            $phone = $_POST["phone"];
        }
    }
    // #Address Validaion
    // if (empty($_POST["address"])) {
    //     $addressErr = "Address is required.<br/>";
    // } else {
    //     $address = get_safe_value($con, $_POST["address"]);
    // }
    #password validation
    if (empty($_POST["password"])) {
        $phoneErr = "Password is required.<br/>";
    } else {
        if (strlen($_POST["password"]) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!.<br/>";
        } else {
    //$password = get_safe_value($con , $_POST['password']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    }
    if ($nameErr == '' && $emailErr == '' && $phoneErr == '' && $addressErr == '' && $passwordErr == '') {
       
       include_once('../model/users-table.php');
        echo $name;
        echo $email;
        echo $phone;
        echo $password;
        InsertInUsersTable($name,$email,$phone,$password);
        // header("location: ../view/register/index.php");
    //$res = mysqli_query($con, $sql);
    //echo $res;
    #$count = mysqli_fetch_assoc($res);

    //$count = mysqli_num_rows($res);
    //echo $count;

    }
}

 
?>