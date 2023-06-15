<?php
session_start();
// include a php file that contains the common database connection codes
include "dbFunctions.php";

$msg = "";
$theID = $_SESSION['hotelId'];
$userID = $_POST['id'];
$newDesc = $_POST['details'];
$newRating = $_POST['addRating'];
$date = date('y-m-d');



$queryUpdate = "INSERT INTO reviews (hotelId, userId, review, rating, datePosted) VALUES ($theID,$userID,'$newDesc','$newRating','$date');";


//execute the query
$resultUpdate = mysqli_query($link, $queryUpdate)
        or die(mysqli_error($link));

//if statement to check whether the update is successful
//store the success or error message into variable $msg
if ($resultUpdate) {
    $msg = "Review successfully added";
} else {
    $msg = "Review not added";
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
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <!--
        <?php echo $msg ?>
        <a href='hotelList.php'>Back</a>
        -->
        
        <section class="vh-100" style="background-color: #eeeeee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-top h-100">
                    <div class="col-lg-12 col-xl-9">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-0" style="background-color: #f8f9fa;">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-7 col-xl-7 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3">Addition Status</p>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <center><label class="form-label"><?php echo $msg ?> </label></center>
                                                </div>
                                            </div>

                                            
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <a href='hotelList.php'>Back</a>
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
