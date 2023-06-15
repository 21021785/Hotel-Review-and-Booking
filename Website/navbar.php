<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href=hotelList.php>Hotel Reviews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="hotelList.php">Hotels</a>
            </li>



          </ul>
            <div style=align-items: right class="nav-item">
                <?php
                if (!isset($_SESSION['user_id'])) {
                ?>
                <a class="nav-link" href="login.php">Register/Login</a>
                <?php
                } else {
                ?>
                <a class="nav-link" href="logout.php">Logout</a>
                <?php
                }
                ?>
            </div>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
          </form>
        </div>
      </div>
    

    
</nav>
<div style="text-align: right">
<?php
    if (isset($_SESSION['user_id'])) {
        echo "<i style='text-align:right'>Welcome " . $_SESSION['username'] ."</i>";
    } ?></div>