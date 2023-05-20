<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51MWaKNG8Zy6AeY5bneCRaNqnEKEmqqzGpzD1Oe2XfANhxb6eheiAzGA4v1evPCqPk38i8SbHiTPFHhOgVmq5tael007mEDGBNa",
        "publishableKey" => "pk_test_51MWaKNG8Zy6AeY5bNlZ1gFbcP9HMhKYPJEZQXMHul5QGLYqv5TpH3Hmqhm49Edeiz1Xi12FlaMQO5LeNUAAnWzUc00TSKkud82"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>