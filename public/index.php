<?php

use Foodorder\Entity\Order;
use Foodorder\Factory\FoodFactory;

/**
 * Main Page for Basic Food Ordering Demo App
 */

//use composer autoloader
require_once(__DIR__ . '/../vendor/autoload.php');

//make the $log logger available in script
require_once(__DIR__ . '/../src/loggersetup.php');

if (!isset($_POST['order'])) {
    require_once(__DIR__ . '/../templates/form.php');
} else {
    $order = new Order;

    $fields = ['maincourse', 'drink'];
    $itemNames = [];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $itemNames[] = $_POST[$field];
        }
    }

    foreach ($itemNames as $name) {
        try {
            $item = FoodFactory::make($name);
        } catch (Exception $e) {
            $errorMessage = 'Unable to process that order. Please try again';
            $logger->warn($e->getMessage());
            require_once(__DIR__ . '/../templates/form.php');
            die();
        }
        $order->addItem($item);
    }

    //set variables for use in the display template
    $OrderString = $order->listOrderItems();
    $OrderList = (empty($OrderString) ? 'nothing' :  $OrderString);

    $OrderCost = $order->calculateTotalPrice();

    require_once(__DIR__ . '/../templates/order.php');

    unset($_POST);
}
