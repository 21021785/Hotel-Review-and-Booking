<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
// include a php file that contains the common database connection codes
include ("dbFunctions.php");

$hotelID = $_POST['hotelID'];

// create query to retrieve a single record based on the value of $compID 
$queryItem = "SELECT * FROM hotels
          WHERE hotelId=$hotelID";

// execute the query
$resultItem = mysqli_query($link, $queryItem) or
        die(mysqli_error($link));

// fetch the execution result to an array
$rowItem = mysqli_fetch_array($resultItem);

if (!empty($rowItem)) {
    $hotelId = $rowItem['hotelId'];
    $_SESSION['hotelId'] = $rowItem['hotelId'];

    $hotelName = $rowItem['hotelName'];
    $_SESSION['hotelName'] = $rowItem['hotelName'];

    $hotelAddress = $rowItem['hotelAddress'];
    $_SESSION['hotelAddress'] = $rowItem['hotelAddress'];

    $hotelPicture = $rowItem['picture'];
    $_SESSION['hotelPicture'] = $rowItem['picture'];

    $hotelContact = $rowItem['contactNo'];
    $_SESSION['hotelContact'] = $rowItem['contactNo'];

    $hotelDesc = $rowItem['description'];
    $_SESSION['hotelDesc'] = $rowItem['description'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotel Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container">
            <div class="row" style="text-align:center;">

                <div style="text-align: center;margin:20px 0px 20px 0px;">
                    <h1>Hotel Information</h1>
                </div>
                <div class="col-md-2 col-sm-1"></div>
                <div class="col-md-8 col-sm-10">
                    <?php if (!empty($hotelName)) { ?>
                        <div class="hotel_name">
                            <form method="post" action="reviewList.php?id=<?php echo $hotelID; ?>">
                                <input type="hidden" name="id" value="<?php echo $hotelID ?>">
                                <div>
                                    <br/>
                                    <img src="Images/<?php echo $hotelPicture ?>" style="width:80%" />
                                    <br/><br/>
                                    <div >
                                        <strong>Hotel Name: </strong>
                                        <p >
                                            <?php echo $hotelName ?>
                                        </p>
                                    </div>
                                    <div >
                                        <strong>Address:</strong>
                                        <p >
                                            <?php echo $hotelAddress ?>
                                        </p> 
                                    </div>
                                    <div >
                                        <strong>Contact No:</strong>
                                        <p >
                                            <?php echo $hotelContact ?>
                                        </p> 
                                    </div>
                                    <div >
                                        <strong>Description:</strong>
                                        <p >
                                            <?php echo $hotelDesc ?>
                                        </p>
                                    </div>
                                </div>
                                <div style="text-align: center;margin: 50px ">
                                    <input class="btn btn-dark btn-lg" type="submit" value="See review" >
                                    <div>
                                        <a href="hotels.php"><br/>Back to Hotel List</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-2 col-sm-1"></div>
            </div>
        </div>
    </body>
</html>
