
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $query = "SELECT * FROM bookings";
    $result = mysqli_query($conn, $query);
    
    $bookings = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $bookings[] = $row;
    }
    
    //  bubble sort algorithm 
    $n = count($bookings);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($bookings[$j]['date'] > $bookings[$j + 1]['date']) {
                $temp = $bookings[$j];
                $bookings[$j] = $bookings[$j + 1];
                $bookings[$j + 1] = $temp;
            }
        }
    }
    
    foreach ($bookings as $index => $booking) {
        $id = $booking['id'];
        $sortOrder = $index + 1;
    
        
        $updateQuery = "UPDATE bookings SET sort_order = '$sortOrder' WHERE id = '$id'";
        mysqli_query($conn, $updateQuery);
    }
    

$fullName= $_POST['fullName'];
$email= $_POST['email'];
$address= $_POST['address'];
$gender= $_POST['gender'];
$contact= $_POST['contact'];
$date= $_POST['date'];
$time= $_POST['time'];
$services= $_POST['services'];
$staffs = $_POST['staffs'];
$price =$_POST['price'];
$timet = $_POST['timet'];

if (empty($time)) {
    echo "<script>
        alert('Please select appropriate date and time.');
        window.location.href='index.php';
      </script>";
   }
  
  
  if (empty($staffs) || empty($services)) {
     echo "<script>
        alert('Please check services or staff.');
        window.location.href='index.php';
      </script>";
  }
  
  session_start();

  $userid= $_SESSION['username'];
  $userquery=mysqli_query($conn, "SELECT * FROM users where username='$userid' ");
  $row=mysqli_fetch_array($userquery);
  $id=$row ["id"];
  
  $bookingTime = strtotime($time);
  $fortyFiveMinutesLater = strtotime('+45 minutes', $bookingTime);
  
  $stmt = $conn->prepare("SELECT * FROM bookings WHERE date = ? AND staffs = ?");
  $stmt->bind_param("ss", $date, $staffs);
  $stmt->execute();
  $existingBookings = $stmt->get_result();
  
  $staffAlreadyBooked = false;
  
  while ($booking = $existingBookings->fetch_assoc()) {
      $existingTime = strtotime($booking['time']);
      
      if ($existingTime >= $bookingTime - 2700 && $existingTime <= $fortyFiveMinutesLater) {
          $staffAlreadyBooked = true;
          break;
      }
  }
  if ($staffAlreadyBooked) {
    echo "<script>
        alert('The selected staff is already booked within the selected time period. Please select another staff.');
        window.location = '../booking.php';
        document.getElementById('staffs').selectedIndex = 0; // Reset the staff selection
    </script>";
} else {
    $sql = "INSERT INTO bookings (fullName,email, address, gender, contact, date, time, services, staffs, price, timet, user_id) VALUES ('$fullName','$email','$address','$gender', '$contact' ,'$date','$time','$services', '$staffs', '$price', '$timet','$id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Update the sort_order column
        $updateQuery = "UPDATE bookings AS b
                        JOIN (
                            SELECT id, ROW_NUMBER() OVER (ORDER BY date) AS new_sort_order
                            FROM bookings
                        ) AS tmp ON b.id = tmp.id
                        SET b.sort_order = tmp.new_sort_order";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "<script> alert('Booked Appointment Successfully')
                   window.location = '../viewbook.php';
            </script>";
        } else {
            echo "<script> alert('Error Updating')</script>";
        }
    } else {
        echo "<script> alert('Error Inserting')</script>";
    }
    
    require('F:\xampp\htdocs\OnlineSalon\Stripes.php');

    if(isset($_POST['stripeToken'])){
        \Stripe\Stripe::setVerifySslCerts(false);
    
        $token = $_POST['stripeToken'];
    
        $data = \Stripe\Charge::create(array(
            "amount" => 150000,
            "currency" => "npr",
            "source" => $token,
        ));
    
        echo "<pre>";
        print_r($data);
    }
}
 
}
  ?>
