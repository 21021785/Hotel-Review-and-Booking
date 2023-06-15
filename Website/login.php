<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$rememberUsername = "";

//check if cookie is set, then set $rememberUsername to cookie
if (isset($_COOKIE['rememberMe'])) {
    $rememberUsername = $_COOKIE['rememberMe'];
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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

                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3">Login</p>

                <form class="mx-1 mx-md-4" method="post" action="doLogin.php">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="registerUsername">Username:</label>
                      <input type="text" name="loginUsername" id="loginUsername" class="form-control" value="<?php echo $rememberUsername; ?>" placeholder="Enter username"/>
                    </div>
                  </div>
                    
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="registerPassword">Password:</label>
                      <input type="password" name="loginPassword" id="loginPassword" class="form-control" placeholder="Enter password"/>
                    </div>
                  </div>
                    
                 <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <td colspan="2" align="left"><input type="checkbox" name="remember">  Remember Me</td>
                  </div>
                    
                  

                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" value="Register" name="submit" class="btn btn-dark btn-lg">Login</button>
                  </div>

                </form>
                
              </div>
            </div>
        </div>
      </div>
          <p style="text-align:center;">Not a member yet? <a href="register.php">Register</a> now!</p>
    </div>
  </div>
</section> 
    </body>
</html>