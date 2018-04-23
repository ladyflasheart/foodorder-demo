<?php
/**
 * Main Page for Basic Food Ordering Demo App
 */

require_once(__DIR__ . '/../src/Class/Order.php');
require_once(__DIR__ . '/../src/Contract/Edible.php');
require_once(__DIR__ . '/../src/Contract/HasPrice.php');
require_once(__DIR__ . '/../src/Contract/HasName.php');
require_once(__DIR__ . '/../src/Class/Burger.php');
require_once(__DIR__ . '/../src/Class/Cola.php');
require_once(__DIR__ . '/../src/Class/Pizza.php');
require_once(__DIR__ . '/../src/Class/Salad.php');
require_once(__DIR__ . '/../src/Class/Sprite.php');

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

    //check maincourses and drinks strings are valid
    if (!empty($itemNames) && !$order->validateOrderItems($itemNames)) {
        $errorMessage = 'Sorry your order included an invalid item. Please try again.';
        require_once(__DIR__ . '/../templates/form.php');
        die();
    };

    // create the maincourse item and add to order
    if (!empty($_POST['maincourse'])) {
        $className = $_POST['maincourse'];
        $item = new $className;
        $order->addItem($item);
    }

    // create the drink item and add to order
    if (!empty($_POST['drink'])) {
        $className = $_POST['drink'];
        $item = new $className;
        $order->addItem($item);
    }

    //set variables for use in the display template
    $OrderString = $order->listOrderItems();
    $OrderList = (empty($OrderString) ? 'nothing' :  $OrderString);

    $OrderCost = $order->calculateTotalPrice();

    require_once(__DIR__ . '/../templates/order.php');

    unset($_POST);
}

