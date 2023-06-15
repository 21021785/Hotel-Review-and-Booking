<?php
session_start();
// php file that contains the common database connection code
include "dbFunctions.php";

if (isset($_SESSION['username']) || isset($_SESSION['user_id'])) {
    session_destroy();
}

$message = "<p>You have logged out.<br /><br/>
        <a href='login.php'>Go back to login page</a></p>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Log out</title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css" />
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

                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3">Logout</p>


                  <div style ="text-align: center" class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="message">You have logged out.</label>
                    </div>
                  </div>
                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <p><a href ="login.php">Login</a> again.</p>
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
