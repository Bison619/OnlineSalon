<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id="title">services</title>
    <link rel="icon" href="assets/images/logo.jpg" type="image/x-icon">
    <style>
        body {
            background-image: url("assets/images/view.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        #cont {
            min-height: 570px;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_nav.php' ?>


    <div class="container my-4" id="cont">
        <div class="row jumbotron">
            <?php
            $id = $_GET['serid'];
            $sql = "SELECT * FROM `services` WHERE serviceid = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $serviceid = $row['serviceid'];
            $services = $row['services'];
            $serviceDesc = $row['serviceDesc'];
            $price = $row['price'];
            $duration = $row['duration'];

            ?>
            <script>
                document.getElementById("title").innerHTML = "<?php echo $services; ?>";
            </script>
            <?php
            echo '
        <div class="col-md-4" style="display: flex; justify-content: center; align-items: center;">    
                <img src="assets/images/services-' . $serviceid . '.jpg" width="340px" height="350px" max-width: 340px;">
         
            </div>
            <div class="col-md-8 my-4" style="padding: 20px; background-color: #f5f5f5; animation: fade-in 0.5s ease-out;">
                <h1 style="font-size: 28px; font-weight: bold; color: #333;">' . $services . '</h1>
                <h4 style="font-size: 18px; color: #888;">Duration: ' . $duration . ' ,</h4>
                <h3 style="font-size: 24px; color: #ff0000; margin-bottom: 10px;">Rs. ' . $price . '/-</h3>
                <p style="font-size: 16px; line-height: 1.5; color: #555;">' . $serviceDesc . '</p>';
                if($loggedin){
                    echo '
                        <a href="booking.php"><button style="font-size:250%;   background-color:#675228;   font-weight: 900;
                        border-radius: 25px;   font-size: 2rem; padding: 10px 40px;" class="btn btn-primary">Book Now</button></a>';
                        
                        }
                        else{
                        echo '<button style="font-size:250%;" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Book Now</button>';
                        }

            echo '</form>
                <a href="index.php#ourservices">
                <button style="font-size:24px; float: right; width: 40px;
                height: 40px;
                font-weight: bold;
                background-color: #f44336;
                color: white;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: background-color 0.3s ease;">&#10006;</button>
                   
                </a>
                 </div>
               
            
     </div>'
                ?>
        </div>
    </div>

    <?php require 'partials/_footer.php' ?>

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