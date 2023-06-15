<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "dbFunctions.php"; 
$theID = $_POST['id'];

//$hotelID = $_POST['hotelID'];

$query = "SELECT * FROM reviews R INNER JOIN users U ON R.userId = U.userId WHERE R.hotelId = $theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

$isEmpty=FALSE;
while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
    $isEmpty=True;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Review List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .col-right-align { text-align: right;}
        </style>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <h1 class="align-items-center"><center>Review List</center></h1>
        <p class="align-items-center"><a href="addReview.php"><center>Add new Review</center></a></p>
        <div class="container">
            <div class="row">
                <table class="table table-striped table-hover" border="1" cellpadding="5" cellspacing="5">
            <tr>
                <th>Review</th>
                <th>Rating</th>
                <th>Date Posted</th>
                <th>Username</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            if ($isEmpty){
            for ($i = 0; $i < count($arrContent); $i++) {
                $reviewId = $arrContent[$i]['reviewId'];
                $hotelId = $arrContent[$i]['hotelId'];
                $userId = $arrContent[$i]['userId'];
                $username = $arrContent[$i]['username'];
                $review = $arrContent[$i]['review'];
                $rating = $arrContent[$i]['rating'];
                $datePosted = $arrContent[$i]['datePosted'];
                ?>
                <tr>
                    <td><?php echo $review; ?></a></td>
                    <td><?php echo $rating; ?></a></td>
                    <td><?php echo $datePosted; ?></a></td>
                    <td><?php echo $username; ?></a></td>
                    <?php
                        if ($_SESSION['username'] == $username) {
                            ?>
                            <td>
                                <form method="post" action="editReview.php?id=<?php echo $reviewId; ?>">
                                    <input type="hidden" name="reviewID" value="<?php echo $reviewId; ?>"/>
                                    <input class="btn btn-primary btn-lg" type="submit" value="Edit"/>
                                </form>
                            </td>
                            <?php
                            if ($_SESSION['username'] == $username) {
                                ?>
                                <td>
                                    <form method="post" action="deleteReview.php?id=<?php echo $reviewId; ?>">
                                        <input type="hidden" name="reviewID" value="<?php echo $reviewId; ?>"/>
                                        <input class="btn btn-danger btn-lg" type="submit" value="Delete"/>
                                    </form>
                                </td>
                                <?php
                            } else {
                                ?>
                                <td></td>
                                <?php
                            }
                            }
                        }
                    
                    ?>
                </tr>
           <?php
            }
            ?>      
        </table>
            </div>
        </div>
        
    </body>
</html>
