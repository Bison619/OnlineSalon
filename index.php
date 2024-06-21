<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/images/logo.jpg" type="image/x-icon">
  <style>
    .icon-badge-group .icon-badge-container {
      display: inline-block;

    }

    .icon-badge-container {

      position: absolute;
    }

    .icon-badge-icon {
      font-size: 30px;
      color: rgb(0 0 0 / 50%);
      position: relative;
    }

    .icon-badge {
      background-color: #979797;
      ;
      font-size: 10px;
      color: white;
      text-align: center;
      width: 15px;
      height: 15px;
      border-radius: 49%;
      position: relative;
      top: -35px;
      left: 17px;
    }


    .contact2 {
      font-family: "Montserrat", sans-serif;
      color: #8d97ad;
      font-weight: 300;
      background-position: center top;
    }

    .contact2 h1,
    .contact2 h2,
    .contact2 h3,
    .contact2 h4,
    .contact2 h5,
    .contact2 h6 {
      color: #3e4555;
      font-size: 200%;

    }

    .contact2 .font-weight-medium {
      font-weight: 500;
    }

    .contact2 .subtitle {
      color: #8d97ad;
      line-height: 24px;
    }

    .contact2 .bg-image {
      background-size: cover;
      position: relative;
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
    }

    .contact2 .card.card-shadow {
      -webkit-box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
      box-shadow: 0px 0px 30px rgba(61, 109, 214, 0.774);
    }

    .contact2 .detail-box .round-social {
      margin-top: 100px;
    }

    .contact2 .round-social a {
      background: transparent;
      margin: 0 7px;
      padding: 11px 12px;
    }

    .contact2 .contact-container .links a {
      color: #8d97ad;
    }

    .contact2 .contact-container {
      position: relative;
      top: 30px;
      font-size: 150%;
    }

    .contact2 .btn-danger-gradiant {
      background: #ff4d7e;
      background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
      background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
      background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
      background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
      background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
    }

    .contact2 .btn-danger-gradiant:hover {
      background: #ff6a5b;
      background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
      background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
      background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
      background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
      background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
    }
  </style>
  
</head>
<?php include 'partials/_dbconnect.php'; ?>
<?php require 'partials/_nav.php'; ?>

<body>


  <!-- home -->

  <section class="home" id="home">

    <div class="content">
      <span>Welcome</span>
      <h3>Book Your Beauty Escape With Ease </h3>
      <a href="booking.php"><button class="book">Book Appointment Now</button></a>
    </div>

  </section>
  <!-- home -->

  <!-- services -->
  <section class="services" id="services">
    <h1 class="heading" id="ourservices">Our Services</h1>

    <div class="box-container">

      <!-- Fetch all the services and use a loop to iterate through services -->
      <?php
            $sql = "SELECT * FROM `services`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['serviceid'];
                $ser = $row['services'];
                echo '
                <div class="box">
         
            <a href="viewservice.php?serid=' . $id . '"> <img src="assets/images/services-' . $id . '.jpg" alt="image for this service"></a>
            <div class="content">
            <a href="viewservice.php?serid=' . $id . '"> <img src="assets/images/icon-' . $id . '.png" alt="image for this service"></a>
            <a style="text-decoration:none;" href="viewservice.php?serid=' . $id . '"> <h1  href="viewservice.php?serid=' . $id . '">' . $ser . '</h1> </a>        
           </div>
          </div>';                
            }
            ?>


    </div>
  </section>
  <!-- services end -->
  <!-- stylist -->
  <h1 class="heading">Our Stylists</h1>
    <div class="Stylist-container">
    <?php
            $sql = 'SELECT * FROM `staffdetails`';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
            $contact = $row['contact'];
            $description = $row['description'];
            ?>
            <?php
            echo'
        <div class="Stylist-card">
            <img src="assets\images\Stylist-' . $id . '.jpg" alt="Stylist 1">
            <h2>' . $name . '</h2>
            <p>Email: ' . $email . '</p>
            <p>Contact: ' . $contact . '</p>
            <p>Address: ' . $address . '</p>
            <p>Description: ' . $description . '</p>
        </div>';
            }
        ?>
    </div>
  <!-- stylist end-->

  <!-- blog -->

  <section class="blogs" id="blog">

    <h1 class="heading"> our blogs </h1>

    <div class="box-container">

      <div class="box">
        <div class="image">
          <img src="assets/images/blog1.jpg" alt="">
        </div>
        <div class="content">
          <a href="#" class="title">Styling hair service</a>
          <span>by admin / 19th july, 2021</span>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic aut eligendi,
            doloremque nihil
            sapiente fugit aliquam? Error nisi velit, a atque fugit laborum.</p>
        </div>
      </div>

      <div class="box">
        <div class="image">
          <img src="assets/images/blog2.jpg" alt="">
        </div>
        <div class="content">
          <a href="#" class="title">Styling hair service</a>
          <span>by admin / 19th july, 2021</span>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic aut eligendi,
            doloremque nihil
            sapiente fugit aliquam? Error nisi velit, a atque fugit laborum.</p>
        </div>
      </div>

      <div class="box">
        <div class="image">
          <img src="assets/images/blog3.jpg" alt="">
        </div>
        <div class="content">
          <a href="#" class="title">Styling hair service</a>
          <span>by admin / 19th july, 2021</span>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic aut eligendi,
            doloremque nihil
            sapiente fugit aliquam? Error nisi velit, a atque fugit laborum.</p>

        </div>
      </div>

    </div>

  </section>

  <!-- blog end-->

  <!-- Contact -->
  <h1 class="heading">Contact Us</h1>

  <div class="contact2" id="contact">
    <div class="container">
      <div class="row contact-container">
        <div class="col-lg-12">
          <div class="card card-shadow border-0 mb-4">
            <div class="row">
              <div class="col-lg-8">
                <div class="contact-box p-4">
                  <div class="row">
                    <div class="col-lg-8">
                    </div>
                    <?php if ($loggedin) { ?>
                    <div class="col-lg-4">
                      <div class="icon-badge-container mx-1" style="padding-left: 167px;">
                        <a href="#" data-toggle="modal" data-target="#adminReply"><i
                            class="far fa-envelope icon-badge-icon"></i></a>
                        <div class="icon-badge"><b><span id="totalMessage">0</span></b></div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

                  <form action="partials/_manageContactUs.php" method="POST">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group mt-3">
                          <b><label for="email" style="font-size: 120%;">Email:</label></b>
                          <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Your Email" required value="" style="font-size: 100%;">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mt-3">
                          <b><label for="phone" style="font-size: 120%;">Phone No:</label></b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon" style="font-size: 100%;">+977</span>
                            </div>
                            <input type="tel" class="form-control" id="phone" name="phone"
                              aria-describedby="basic-addon" placeholder="Enter Your Phone Number" required
                              pattern="[0-9]{10}" value="" style="font-size: 100%;">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mt-3">
                          <b><label for="password" style="font-size: 120%;">Password:</label></b>
                          <input style="font-size: 100%;" class="form-control" id="password" name="password"
                            placeholder="Enter Password" type="password" placeholder="Enter Your Password" required
                            data-toggle="password">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group  mt-3">
                          <textarea style="font-size: 150%;" class="form-control" id="message" name="message" rows="2"
                            required minlength="6" placeholder="How May We Help You ?"></textarea>
                        </div>
                      </div>
                      <?php if ($loggedin) { ?>
                      <div class="col-lg-12">
                        <button type="submit" style="font-size: 120%;"
                          class="btn btn-danger-gradiant mt-3 mb-3 text-white border-0 py-2 px-3"><span> SUBMIT NOW <i
                              class="ti-arrow-right"></i></span></button>
                        <button type="button" style="font-size: 120%;"
                          class="btn btn-danger-gradiant mt-3 mb-3 text-white border-0 py-2 px-3 mx-2"
                          data-toggle="modal" data-target="#history"><span> HISTORY <i
                              class="ti-arrow-right"></i></span></button>
                      </div>
                      <?php } else { ?>
                      <div class="col-lg-12">
                        <button style="font-size: 120%;" type="submit"
                          class="btn btn-danger-gradiant mt-3 text-white border-0 py-2 px-3" disabled><span> SUBMIT NOW
                            <i class="ti-arrow-right"></i></span></button>
                        <small class="form-text text-muted"><b>First login to Contct with Us.</b></small>
                      </div>
                      <?php } ?>
                    </div>
                  </form>
                </div>
              </div>
              <?php
              $sql = "SELECT * FROM `sitedetail`";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);

              $systemName = $row['systemName'];
              $address = $row['address'];
              $email = $row['email'];
              $contact1 = $row['contact1'];
              $contact2 = $row['contact2'];

              echo '<div class="col-lg-4 bg-image" style="background-image:url(assets/images/contact.jpg)">
                          <div class="detail-box p-4">
                            <h5 class="text-white font-weight-light mb-3">ADDRESS</h5>
                            <p class="text-white op-7">' . $address . '</p>
                            <h5 class="text-white font-weight-light mb-3 mt-4">CALL US</h5>
                            <p class="text-white op-7">' . $contact1 . '
                              <br> ' . $contact2 . '</p>
                            <div class="round-social light">
                              <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=' . $email . '" class="ml-0 text-decoration-none text-white border border-white rounded-circle" target="_blank"><i class="far fa-envelope"></i></a>
                              <a href="https://github.com/Bison619" class="text-decoration-none text-white border border-white rounded-circle" target="_blank"><i class="fab fa-github"></i></i></a>
                              <a href="https://youtube.com/" class="text-decoration-none text-white border border-white rounded-circle" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                          </div>
                        </div>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Message Modal -->
  <div class="modal fade" id="adminReply" tabindex="-1" role="dialog" aria-labelledby="adminReply" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(187 188 189);">
          <h5 class="modal-title" id="adminReply">Admin Reply</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="messagebd">
          <table class="table-striped table-bordered col-md-12 text-center">
            <thead style="background-color: rgb(111 202 203);">
              <tr>
                <th>Contact Id</th>
                <th>Reply Message</th>
                <th>datetime</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `contactreply` WHERE `userId`='$userId'";
              $result = mysqli_query($conn, $sql);
              $count = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                $contactId = $row['contactId'];
                $message = $row['message'];
                $datetime = $row['datetime'];
                $count++;
                echo '<tr>
                                <td>' . $contactId . '</td>
                                <td>' . $message . '</td>
                                <td>' . $datetime . '</td>
                              </tr>';
              }
              echo '<script>document.getElementById("totalMessage").innerHTML = "' . $count . '";</script>';
              if ($count == 0) {
                ?>
              <script>
                document.getElementById("messagebd").innerHTML =
                  '<div class="my-1">you have not recieve any message.</div>';
              </script>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- history Modal -->
  <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(187 188 189);">
          <h5 class="modal-title" id="history">Your Sent Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="bd">
          <table class="table-striped table-bordered col-md-12 text-center">
            <thead style="background-color: rgb(111 202 203);">
              <tr>
                <th>Contact Id</th>

                <th>Message</th>
                <th>datetime</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `contact` WHERE `userId`='$userId'";
              $result = mysqli_query($conn, $sql);
              $count = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                $contactId = $row['contactId'];

                $message = $row['message'];
                $datetime = $row['time'];
                $count++;
                echo '<tr>
                                <td>' . $contactId . '</td>
                             
                                <td>' . $message . '</td>
                                <td>' . $datetime . '</td>
                              </tr>';
              }
              if ($count == 0) {
                ?>
              <script>
                document.getElementById("bd").innerHTML = '<div class="my-1">you have not contacted us.</div>';
              </script>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  <!-- reviews -->

  <section class="review" id="review">

    <h1 class="heading">Customer's Review</h1>

    <div class="box-container">

      <div class="box">
        <img src="assets/images/quote-img.png" alt="" class="quote">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga
          sequi
          nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex
          aliquam minus
          vel? Nemo.</p>
        <img src="assets/images/review-1.png" class="user" alt="">
        <h3>derek rude</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>

      <div class="box">
        <img src="assets/images/quote-img.png" alt="" class="quote">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga
          sequi
          nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex
          aliquam minus
          vel? Nemo.</p>
        <img src="assets/images/review-2.png" class="user" alt="">
        <h3>jenny white</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>

      <div class="box">
        <img src="assets/images/quote-img.png" alt="" class="quote">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga
          sequi
          nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex
          aliquam minus
          vel? Nemo.</p>
        <img src="assets/images/review-3.png" class="user" alt="">
        <h3>kate mudton</h3>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>

    </div>

  </section>

  <!-- reviews end -->


  <script src="assets/js/script.js"></script>
  <?php include 'partials/_footer.php'; ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>

</html>