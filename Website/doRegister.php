<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "dbFunctions.php";

$username = $_POST['registerUsername'];
$password = $_POST['registerPassword'];
$name = $_POST['registerName'];
$address = $_POST['registerAddress'];
$email = $_POST['registerEmail'];


$exist = "SELECT username FROM users WHERE username LIKE '$username'";

$checkExist = mysqli_query($link, $exist) or die(mysqli_error($link));

if (mysqli_num_rows($checkExist) >= 1) {
    $header = "Registration Failed";
    $postLink = "register.php";
    $message = "Sorry, the usermame $username is already taken.";
    $button = "Try Again";
} else {
    
    $query = "INSERT INTO users
          (username,password,name,address,email) 
          VALUES 
          ('$username',SHA1('$password'),'$name',
           '$address','$email')";

    $status = mysqli_query($link, $query);
    
    if ($status) {
        $header = "Registration Successful";
        $postLink = "hotelList.php";
        $message = "Your new account has been successfully created.";
        $button = "Let's Go!";
    }
    else {
        $header = "Registration Failed";
        $postLink = "register.php";
        $message = "Sorry, the usermame <?php $username ?> is already taken.";
        $button = "Try Again";
}}


mysqli_close($link);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Status</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include 'navbar.php'?>
<section class="vh-100" style="background-color: #eeeeee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-top h-100">
      <div class="col-lg-12 col-xl-9">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-0" style="background-color: #f8f9fa;">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-7 col-xl-7 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3"><?php echo $header?></p>

                <form class="mx-1 mx-md-4 align-items-center" method="post" action="<?php echo $postLink?>">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw align-items-center"></i>
                    <div class="form-outline flex-fill mb-0 align-items-center">
                      <label class="form-label align-items-center" for="message"><?php echo $message?></label>
                    </div>
                  </div>
                    
                  

                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" value="Register" name="submit" class="btn btn-dark btn-lg"><?php echo $button ?></button>
                  </div>

                </form>
                
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section> 
    </body>
</html>
