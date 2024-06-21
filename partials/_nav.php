<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
} else {
  $loggedin = false;
  $userId = 0;
}

$sql = "SELECT * FROM `sitedetail`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$systemName = $row['systemName'];

echo '
    <section class="header">

        <a href="index.php" class="logo"> ' . $systemName . ' </a>
     
        <nav class="navbar">
        <div id="close-navbar" class="fas fa-times"></div>
           <a href="index.php" class="navv">home</a>
          
           <a class="navv nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All Services
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
            $sql = "SELECT services, serviceid FROM `services`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              echo '<a style="font-size:200%;" class="dropdown-item" href="viewservice.php?serid=' .$row['serviceid']. '">' .$row['services']. '</a>';
            }
            echo '</div>

           <a href="stylist.php" class="navv">Stylist</a>
           <a href="about.php" class="navv">About Us</a>
           <a href="contact.php" class="navv">Contact Us</a>
           ';
if ($loggedin) {
  echo '
                        <a href="booking.php"><button class="book">Book Now</button></a>
                        <ul class="navbar-nav mr-2">
                             
                            <a class="navv nav-link " style="color:rgb(42, 32, 28);" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <b>Welcome</b> ' . $username . '</a>

                        </ul>
                        <div class="text-center image-size-small position-relative">
                          <a href="viewProfile.php"><img src="assets/images/person-' . $userId . '.jpg" class="rounded-circle" onError="this.src = \'assets/images/profilePic.jpg\'" style="width:50px; height:50px;border: 3.5px solid white;"></a>
                        </div>';
} else {
  echo '
                        <button type="button" class="logsin"  data-toggle="modal" data-target="#loginModal">Login</button>
                        <button type="button" class="logsin"  data-toggle="modal" data-target="#signupModal">SignUp</button>';
}

echo '</nav>
<div id="menu-btn" class="fas fa-bars"></div>
</section>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert" >
                            <strong><h3>Success!</h3></strong> <h3>You can now login.</h3>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><h1>×</h1></span></button>
                          </div>';
}
if (isset($_GET['error']) && $_GET['signupsuccess'] == "false") {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><h3>Warning!</h3></strong><h3> ' . $_GET['error'] . ' </h3>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><h1>×</h1></span></button>
                          </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><h3>Success!</h3></strong><h3> You are logged in</h3>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><h1>×</h1></span></button>
                          </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><h3>Warning!</h3></strong><h3> Invalid Credentials </h3>
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><h1>×</h1></span></button>
                          </div>';
}

?>
<script>
          let navbar = document.querySelector('.header .navbar');
      let menuBtn = document.querySelector('#menu-btn');
      let closeBtn = document.querySelector('#close-navbar');

      menuBtn.onclick = () =>{
        navbar.classList.add('active');
      };

      closeBtn.onclick = () =>{
          navbar.classList.remove('active');
      };

      window.onscroll = () =>{
        navbar.classList.remove('active');
      };

    <?php require_once("assets\js\script.js");?>
</script>
