<?php require 'stripe.php';?>

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