<?php


use syberry\academy\controller\SubscriptionController;

spl_autoload_register(function ($class_name) {
    $str_replace = str_replace(["\\", "syberry/"], ["/", ""], $class_name) . '.php';
    /** @var string $str_replace */
    include $str_replace;
});


$subscriptionController = new SubscriptionController();

if (isset($argv[1])) {
    $response = $subscriptionController->cancelSubscriptionForUser((int)explode('=', $argv[1])[1]);

    echo isset($response->getData()['message']) ? $response->getData()['message'] : 'All is OK';
} else {
    echo 'U must enter user id';
}
echo "\n";
