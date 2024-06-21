<?php
include 'partials/_dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $query = "SELECT email FROM bookings WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $customerEmail = $row['email'];

     
        $deleteQuery = "DELETE FROM bookings WHERE id = $id";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
           
            $to_email= $customerEmail;
            $subject = "Booking Cancellation Notification";     
            $body = "Dear Customer,\n\n";
            $body .= "Your booking has been cancelled successfully. We apologize for any inconvenience caused. ";
            $body .= "If you have any further inquiries or require a refund, please visit our store or contact us.\n\n";
            $body .= " Contact Us At =9815325525\n\n";
            $body .= "Thank you for your understanding.\n\n";
            $body .= "Best regards,\n";
            $body .= "Salon Booking Team";
            $headers = "From: baruwal20@gmail.com";

           
            if (filter_var($to_email, FILTER_VALIDATE_EMAIL)) {
                $mailSent = (mail($to_email, $subject, $body, $headers));

                if ($mailSent) {
                    echo "<script>
                        alert('Your booking has been cancelled successfully. Please check your email for further instructions.');
                        window.location.href = 'viewbook.php';
                    </script>";
                } else {
                    echo "<script>
                        alert('There was an error sending the email. Please try again.');
                        window.location.href = 'viewbook.php';
                    </script>";
                }
            } else {
                echo "<script>
                    alert('The email you provided is invalid. Please provide a valid email address.');
                    window.location.href = 'viewbook.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Failed to cancel the booking. Please try again.');
                window.location.href = 'viewbook.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Booking not found.');
            window.location.href = 'viewbook.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request.');
        window.location.href = 'viewbook.php';
    </script>";
}
?>
