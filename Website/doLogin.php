<?php
session_start();
// php file that contains the common database connection code
include "dbFunctions.php";
$msg = "";
$header = "";


$footer = "";
//retrieve form data
$entered_username = $_POST['loginUsername'];
$entered_password = $_POST['loginPassword'];

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
    $header = "Welcome";
    $msg = "<b>Notice:</b>You are already logged in.";

    $msg .= "<br/><b>Username:</b> " . $_SESSION['username'];
    $msg .= "<br/><b>Name: </b>" . $_SESSION['name'];
    $msg .= "<br/><b>Address: </b>" . $_SESSION['address'];
    $msg .= "<br/><b>Email: </b>" . $_SESSION['email'];

    $footer = '<p style="text-align:center;">Proceed to view <a href="hotelList.php">Hotels</a> list.</p>';
} else { //user is not logged in
    //check whether form input 'username' contains value
    //match the username and password entered with database record
        $query = "SELECT * FROM users 
                  WHERE username='$entered_username' AND 
                  password = SHA1('$entered_password')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        //if record is found, store id and username into session
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $row['userId'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['email'] = $row['email'];

            $header = "Welcome";

            $msg = "<b>Username:</b> " . $_SESSION['username'];
            $msg .= "</br><b>Name: </b>" . $_SESSION['name'];
            $msg .= "</br><b>Address: </b>" . $_SESSION['address'];
            $msg .= "</br><b>Email: </b>" . $_SESSION['email'];

            $footer = '<p style="text-align:center;">Proceed to view <a href="hotelList.php">Hotels</a> list.</p>';
        } else { //record not found
            $header = "Login Failed";
            $msg = "No Matching record found!";
            $footer = '<p style="text-align:center;"><a href="login.php">Login</a> again.</p>';
        }
}

if (isset($_POST['remember'])) {
    setcookie('rememberMe', $_SESSION['username'], time() + 60 * 60 * 24 * 365 * 10);
} else {
    setcookie('rememberMe', "", time() + 60 * 60 * 24 * 365 * 10);
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login Status</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <section class="vh-100" style="background-color: #eeeeee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-top h-100">
                    <div class="col-lg-12 col-xl-9">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-0" style="background-color: #f8f9fa;">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-7 col-xl-7 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3"><?php echo $header ?></p>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="message"><?php echo $msg ?></label>
                                            </div>
                                        </div>


                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <?php echo $footer ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section> 
    </body>
</html>
