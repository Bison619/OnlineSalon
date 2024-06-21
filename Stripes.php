<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51MU4v9Eg0582ocSs9b2nuomBY688zplaquPfwqHDPTUQnAKnRsoQSIW1iPumuROLoIhT9EFLux11nwUoYarzKR1a00uLbhxw7R";

$secretKey="sk_test_51MU4v9Eg0582ocSsegO8ufjeG0VjXVoEJQlGons5ApeM9XPG00G6dXERYUD0IGj2UrlHRY9YDtXD67JFYlsGhGLU00UGYX0jsa";

\Stripe\Stripe::setApiKey($secretKey);
?>