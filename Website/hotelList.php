<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "dbFunctions.php";

$query = "SELECT * FROM hotels";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}
mysqli_close($link);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotel List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <div class="container">
            <div class="row">
                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3">List of Hotels</p>

                <?php
                for ($i = 0; $i < count($arrContent); $i++) {

                    $hotelId = $arrContent[$i]['hotelId'];
                    $hotelName = $arrContent[$i]['hotelName'];
                    $hotelAddress = $arrContent[$i]['hotelAddress'];
                    $hotelPicture = $arrContent[$i]['picture'];
                    $hotelContact = $arrContent[$i]['contactNo'];
                    $hotelDescription = $arrContent[$i]['description'];
                    ?>
                <div class="col-md-6 col-sm-12" style="margin-bottom: 30px">
                        <div class="card">
                            <img src="images/<?php echo $hotelPicture ?>" class="card-img-top" alt="Hotel Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $hotelName ?></h5>
                                <p class="card-text"><?php echo $hotelAddress ?></p>
                                <form method="post" action="hotelDetails.php?id=<?php echo $hotelId ?>">
                                    <input type="hidden" name="hotelID" value="<?php echo $hotelId; ?>"/>
                                    <input class="btn btn-dark btn-lg" type="submit" value="See More">
                                </form>
                            </div>   
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>

    </body>
</html>
