<?php
session_start();
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotel Review App</title>
        
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

                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-1 mt-3">Register</p>

                <form class="mx-1 mx-md-4" method="post" action="doRegister.php">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="registerUsername">Username:</label>
                      <input type="text" name="registerUsername" id="registerUsername" class="form-control" placeholder="Enter username"/>
                    </div>
                  </div>
                    
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="registerPassword">Password</label>
                      <input type="password" name="registerPassword" id="registerPassword" class="form-control" placeholder="Enter password"/>
                    </div>
                  </div>
                    
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="registerName">Name:</label>
                      <input type="text" name="registerName" id="registerName" class="form-control" placeholder="Enter name"/>
                    </div>
                  </div>
                    
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="registerAddress">Address:</label>
                      <input type="text" name="registerAddress" id="registerAddress" class="form-control" placeholder="Enter address"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="registerEmail">Email: </label>
                      <input type="email" name="registerEmail" id="registerEmail" class="form-control" placeholder="Enter email"/>
                    </div>
                  </div>

                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" value="Register" name="submit" class="btn btn-dark btn-lg">Register</button>
                  </div>

                </form>
                
              </div>
            </div>
        </div>
      </div>
          <p style="text-align:center;">Already a member? <a href="login.php">Login</a> now!</p>
    </div>
  </div>
</section> 
        <!--
        
        
        <h3>Get Together - Register</h3>
        <h4>Please fill the following to sign up for "Get Together".</h4>
        <form method="post" action="doRegister.php">
            <fieldset style="width:500px;">
                <table>
                    <tr>
                        <td class="col-right-align"><label>Name:</label></td>
                        <td><input type="text" name="name" /></td>
                    </tr>
                    <tr>
                        <td class="col-right-align"><label>Gender:</label></td>
                        <td>
                            <input type="radio" name="gender" value="male"/>male
                            <input type="radio" name="gender" value="female"/>female
                        </td>
                    </tr>
                    <tr>
                        <td class="col-right-align"><label>Birthdate:</label></td>
                        <td><input type="text" name="birthdate"/> (format: YYYY-MM-DD)</td>
                    </tr>
               
                    <tr>
                        <td colspan="2"><hr /></td>
                    </tr>
                    <tr>
                        <td class="col-right-align"><label>Username:</label></td>
                        <td><input type="text" name="username"/></td>
                    </tr>
                    <tr>
                        <td class="col-right-align"><label>Password:</label></td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                </table>	
            </fieldset>
            <input type="submit" value="Sign Up" name="submit"/>
        </form> 
        
        
        <?php
        // put your code here
        ?>
    </body>
        -->
</html>
