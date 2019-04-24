<?php
/**
 * Main template for the ordering form
 */

require_once(__DIR__ . '/header.php');
?>

<div class="maincontent">
        <ul>
            <li>
                <h2>Your Order</h2>
            </li>
            <li> You have ordered : <?php echo $OrderList ?>
            </li>
            <li> The total cost is : &pound;  <?php echo $OrderCost ?>
            </li>
            <li>
                <input type="hidden" name="order" value="order">
            </li>
            <li>
                <a href="">Make another order</a>
            </li>
        </ul>
</div>

<?php
require_once(__DIR__ . '/footer.php');
