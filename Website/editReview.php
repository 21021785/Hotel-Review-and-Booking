<?php
session_start();
// include a php file that contains the common database connection codes
include ("dbFunctions.php");

$reviewId = $_POST['reviewID'];

// create query to retrieve a single record based on the value of $compID 
$queryItem = "SELECT * FROM reviews
          WHERE reviewId=$reviewId";

// execute the query
$resultItem = mysqli_query($link, $queryItem) or
        die(mysqli_error($link));

// fetch the execution result to an array
$rowItem = mysqli_fetch_array($resultItem);
if (!empty($rowItem)) {
    $id = $rowItem['reviewId'];
    $hotelId = $rowItem['hotelId'];
    $userId = $rowItem['userId'];
    $review = $rowItem['review'];
    $rating = $rowItem['rating'];
    $datePosted = $rowItem['datePosted'];
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
        <title>Edit Review</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <!--
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Edit Review</h3>
                <form method="post" action="doEditReview.php">
                    <label>Username: </label>
        <?php echo $_SESSION['username'] ?>
                    <br/><br/>


                    <label>Comments:</label>
                    <textarea rows="5" cols="30" 
                              name="details"><?php echo $rowItem['review'] ?>
                    </textarea> 

                    <label for="editRating">Rating:</label><br/>

                    <select name="editRating" id="editRating">
        <?php
        $options = array("1", "2", "3", "4", "5");
        for ($i = 0; $i < count($options); $i++) {
            if ($rating == $option) {
                echo "<option value='$option' selected>$option</option>";
            } else {
                echo "<option value='$option'>$option</option>";
            }
        }
        ?>
                    </select>

                    <input type="hidden" name="id" value="<?php echo $rowItem['hotelId'] ?>"/>
                    <input type="submit" value="Update Item"/>
                </form> 
            </div>
            <div class="col-md-3"></div>

        </div>
        -->
        <section class="vh-100" style="background-color: #eeeeee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-top h-100">
                    <div class="col-lg-12 col-xl-9">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-0" style="background-color: #f8f9fa;">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-7 col-xl-7 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3">Edit Review</p>

                                        <form class="mx-1 mx-md-4" method="post" action="doEditReview.php">

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <center><label class="form-label"><b>Username:</b> </label><?php echo " " . $_SESSION['username'] ?></center>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label"><b>Comments:</b></label><br/>
                                                    <textarea rows="5" cols="70" 
                                                              name="details"><?php echo $rowItem['review'] ?>
                                                    </textarea> 
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4 justify-content-center">
                                                <label for="editRating">Rating: </label><br/>
                                                <center>
                                                    <select name="editRating" id="editRating">

                                                        <?php
                                                        $options = array("1", "2", "3", "4", "5");
                                                        foreach ($options as $option) {
                                                            if ($rating == $option) {
                                                                echo "<option value='$option' selected>$option</option>";
                                                            } else {
                                                                echo "<option value='$option'>$option</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </center>
                                            </div>





                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" value="<?php echo $rowItem['reviewId'] ?>" name="id" class="btn btn-dark btn-lg">Update Review</button>
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
