<?php
function create_time_range($start, $end, $interval = '30 mins', $format = '12') {
  $startTime = strtotime($start);
  $endTime = strtotime($end);
  $returnTimeFormat = ($format == '12') ? 'g:i A' : 'G:i';

  $times = array();
  while ($startTime <= $endTime) {
      $times[] = date($returnTimeFormat, $startTime);
      $startTime += strtotime('+' . $interval, 0);
  }
  return $times;
}

$times = create_time_range('07:30', '20:00', '30 mins');
?>
<?php
    include 'partials/_dbconnect.php';
    $sql="Select * from services";
  $servicedata= mysqli_query($conn,$sql);
 ?>
<?php
   include 'partials/_dbconnect.php';
    $query="Select * from staffdetails";
  $data= mysqli_query($conn,$query);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <title>Booking</title>
  <link rel="icon" href="assets/images/logo.jpg" type="image/x-icon">
  <style>
    body {
      background-image: url("assets/images/booking.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;

    }

    .form-field {
      display: flex;
      justify-content: space-between;
    }

    .form-outline .form-control {
      min-height: auto;
      padding: .33em .75em;
      border: 0;
      background: transparent;
      -webkit-transition: all .2s linear;
      transition: all .2s linear;
      width: 181px;
      margin-right: -7px;
    }

    legend {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="checkbox"],
    input[type="radio"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .two-cols {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }

    .inline {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin-top: 5px;
    }

    .btns {
      text-align: center;
      margin-top: 20px;
      padding-top: 40px;
    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 5px 20px;
      border-radius: 25px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      font-size: 1.5rem;

    }

    input[type="submit"]:hover {
      background-color: #555;
    }

    .btnnnn {
      border: none;
      background-color: #675228;
      padding: 10px 40px;
      cursor: pointer;
      display: inline-block;
      font-size: 3rem;
      margin-left: 63rem;
      margin-bottom: 3rem;
      color: white;
      text-transform: capitalize;
      font-weight: 700;
      border-radius: 25px;
      margin-top: 2rem;
    }

    .btnnnn:hover {
      background-color: var(--black);
      color: #fff;
    }

    .bwn {
      border: none;
      background-color: rgb(93, 46, 144);
      padding: 10px 20px;
      cursor: pointer;
      display: inline-block;
      font-size: 1.2rem;
      color: white;
      text-transform: capitalize;
      border-radius: 25px;
      font-weight: 700;
    }
  </style>
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php include 'partials/_nav.php'; ?>
  <?php require ('Stripes.php');?>

  <?php
    if($loggedin){
    ?>

  <h1 class="heading">Booking Request</h1>
  <form action="\OnlineSalon\partials\_booking.php" method="post"
    style=" max-width: 430px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); zoom: 167%;">

    <a href="#" onclick="openPopup();" style="text-decoration: none;font-size:12px; background-color: black; color: white; display: inline-flex; width: 15px; height: 15px; border-radius: 50%; padding-bottom: 15px; justify-content: center; float:right;">
      <b>i</b>
    </a>
    <div style=" display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;" id="popup" class="popup-container" onclick="closePopup();">
      <div style=" max-width: 400px;
    margin: 20% auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);" class="popup-box">
        <span style="
    cursor: pointer;
    color: #888;
    font-size: 20px;
    position: absolute;
    top: 10px;
    right: 10px;" class="popup-close" onclick="event.stopPropagation();">&times;</span>
        <h1><b>Time-Open</b></h1>
        <p>Monday-Friday<br>7am - 9pm</p>
        <h1></h1>
        <span style="font-size:large;"><b>Saturday and Sunday</b></span><br><span style="color:red;"> No service
          Available</span>
      </div>
    </div>
    <fieldset>
      <legend>Personal Details</legend>
      <label>
        FullName:
        <input type="text" name="fullName" required>
      </label>
      <div class="two-cols">
        <label>
          Email:
          <input type="email" name="email" required>
        </label>
        <label>
          Phone number:
          <input type="tel" name="contact">
        </label>
        <label>
          Address:
          <input type="text" name="address" required>
        </label>
        <div class="inline">
          <label>
            Gender:
          </label>
          <label>
            <input type="radio" name="gender" value="Male" />
            Male
          </label>
          <label>
            <input type="radio" name="gender" value="Female" />
            Female
          </label>
        </div>

      </div>
    </fieldset>

    <fieldset>
      <legend>Appointment request</legend>
      <div class="two-cols">

        <label>
          <b>Date:</b>
          <input type="date" id="date" class="form-control" name="date" required />
        </label>

        <label><b>Time:</b>
          <input name="Appointment request">
          <select class="custom-time" name="time" id="time"
            style=" border: 1.5px solid #ddd;  padding: 8px; border-radius: 5px;">
            <option>Select Time</option>
            <?php foreach($times as $key=>$val){ ?>
            <option name="time" class="custom-option" value="<?php echo $val;?>"><?php echo $val;?></option>
            <?php } ?>
          </select>
        </label>
      </div>
    </fieldset>
    <div class="two-cols">
      <label><b>Services:</b>
        <select class="form-control" name="services" id="service"
          style=" border: 1.5px solid #ddd; border-radius: 5px;">
          <?php while ($result= mysqli_fetch_array($servicedata)):;?>
          <!-- Home Ware -->
          <option name="services" data-price="<?php echo $result[2];?>" time="<?php echo $result[3];?>"
            service="<?php echo $result[0];?>"><?php echo $result[1];?></option>
          <?php endwhile;?>
        </select>
      </label>
      <select disabled="disabled" class="subcat" id="category2" name="staffs">
        <option value style="border: 1.5px solid #ddd;  padding: 8px; border-radius: 5px;">Available Staffs</option>
        <?php while ($result= mysqli_fetch_array($data)):;?>
        <!-- Home Ware -->
        <option name="staffs" staffs="<?php echo $result[0];?>"><?php echo $result[1];?></option>
        <?php endwhile;?>
      </select>
    </div>
    <div class="form-field">
      <div class="form-group">
        <label class="form-label" id="prices" for="form2Example2" style="border:none;"><b>Price</b></label>
        <input id="price" readonly="readonly" class="form-control" name="price">
      </div>
      <div class="form-outlin mb-4">
        <label class="form-label" id="time" name="timet" for="form2Example2"
          style="border:none;"><b>Duration</b></label>
        <input id="times" readonly="readonly" class="form-control" name="timet">

      </div>

    </div>
    <div class="inline">
      <form id="stripe-form" action="process_payment.php" method="post">
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?php echo $publishableKey ?>"
            data-amount=""
            data-name="Salon Booking"
            data-image="assets\images\stripe.png"
            data-currency="npr"
            data-email="SalonBooking@gmail.com">
        </script>
    </form>
</div>

  </form>
  <a href="viewbook.php"><button class="btnnnn">Your Bookings</button></a>
  <?php
    }
    else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Before Booking you need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>
  <?php include 'partials/_footer.php'; ?>
  <<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js">
    </script>

    <script type="text/javascript">
      var date = new Date();
      var tdate = date.getDate();
      var month = date.getMonth() + 1;
      if (tdate < 10) {
        tdate = '0' + tdate;
      }
      if (month < 10) {
        month = '0' + month;
      }
      var year = date.getUTCFullYear();
      var minDate = year + "-" + month + "-" + tdate;

      // sun & sat check
      function isWeekend(date) {
        var day = date.getDay();
        return day === 0 || day === 6;
      }

      // sun & sat block
      function disableWeekends(date) {
        return [!isWeekend(date)];
      }

      window.onload = function () {
        document.getElementById("date").setAttribute('min', minDate);
        document.getElementById("date").addEventListener('input', function () {
          var selectedDate = new Date(this.value);
          if (isWeekend(selectedDate)) {
            this.value = '';
            alert('Saturday and Sunday we are Close. Please choose another date.');
          }
        });
        $('#date').datepicker({
          beforeShowDay: disableWeekends
        });
      };
    </script>



    <script type="text/javascript">
      $(function () {
        $('#service').change(function () {
          $('#price').val($('#service option:selected').attr('data-price'));
        });
      });

      $(function () {
        $('#service').change(function () {
          $('#times').val($('#service option:selected').attr('time'));
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#service').change(function () {
          var selectedOption = $('#service option:selected');
          var price = selectedOption.attr('data-price');
          var amountInNPR = parseFloat(price) *
            100; // Stripe expects the amount in the smallest currency unit (e.g., cents for NPR)
          $('.stripe-button').attr('data-amount', amountInNPR);
        });
      });
    </script>

    <script>
      $(function () {

        var $cat = $("#service"),
          $subcat = $(".subcat");

        var optgroups = {};

        $subcat.each(function (i, v) {
          var $e = $(v);
          var _id = $e.attr("id");
          optgroups[_id] = {};
          $e.find("optgroup").each(function () {
            var _r = $(this).data("rel");
            $(this).find("option").addClass("is-dyn");
            optgroups[_id][_r] = $(this).html();
          });
        });
        $subcat.find("optgroup").remove();

        var _lastRel;
        $cat.on("change", function () {
          var _rel = $(this).val();
          if (_lastRel === _rel) return true;
          _lastRel = _rel;
          $subcat.find("option").attr("style", "");
          $subcat.val("");
          $subcat.find(".is-dyn").remove();
          if (!_rel) return $subcat.prop("disabled", true);
          $subcat.each(function () {
            var $el = $(this);
            var _id = $el.attr("id");
            $el.append(optgroups[_id][_rel]);
          });
          $subcat.prop("disabled", false);
        });

      });
    </script>


    <script>
      function openPopup() {
        document.getElementById('popup').style.display = 'block';
      }

      function closePopup() {
        document.getElementById('popup').style.display = 'none';
      }
    </script>

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