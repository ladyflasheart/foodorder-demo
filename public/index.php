<?php
/**
 * Main Page for Basic Food Ordering Demo App
 */
//basic autoloading example
function my_clunky_autoloader($class)
{
    $folders = [
        __DIR__ . '/../src/Class/',
        __DIR__ . '/../src/Contract/',
    ];

    foreach ($folders as $pathPrefix) {
        $file = $pathPrefix . $class . '.php';
        if (file_exists($file)) {
            include_once($file);
        }
    }
}

spl_autoload_register('my_clunky_autoloader');

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

