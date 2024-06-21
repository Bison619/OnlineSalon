<!-- <?php
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
?> -->
