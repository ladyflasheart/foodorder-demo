<?php
/**
 * Main template for the ordering form
 */

require_once(__DIR__ . '/header.php');
?>

<div class="maincontent">
    <form action="" method="post">
        <ul>
            <li>
                <h2>Order   Food</h2>
            </li>
<?php
// display errors in box at top if relevant
if (isset($errorMessage)) {
            echo '<li class="error">';
            echo $errorMessage;
            echo '</li>';
}
?>
            <li>
                <label for="maincourse">Main Course: </label>
                <select name="maincourse" id="maincourse">
                    <option value="" selected disabled hidden>Select choice</option>
                    <option value="burger">Burger</option>
                    <option value="pizza">Pizza</option>
                    <option value="salad">Salad</option>
                </select>
            </li>
            <li>
                <label for="drink">Drink: </label>
                <select name="drink" id="drink">
                    <option value="" selected disabled hidden>Select choice</option>
                    <option value="sprite">Sprite</option>
                    <option value="cola">Cola</option>
                </select>
            </li>
            <li>
                <input type="hidden" name="order" value="order">
            </li>
            <li>
                <button type="submit">Submit Order</button>
            </li>

        </ul>
    </form>
</div>

<?php
require_once(__DIR__ . '/footer.php');
