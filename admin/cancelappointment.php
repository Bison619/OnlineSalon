<?php
include 'partials/_dbconnect.php';
// Check if the id is provided
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    // Delete the booking from the bookings table
    $sql = "DELETE FROM bookings WHERE id = $id";

    if(mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Booking Cancelled.  Your booking has been cancelled successfully..');
        window.location.href='../admin/index.php';
        </script>";
    } else {
        echo "Error: Could not delete the booking. " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error: No booking ID provided.";
}

?>