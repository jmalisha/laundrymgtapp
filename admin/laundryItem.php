<?php require('./header.php');
if (!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    die();
}
// db connection
require('../connection.php');

$laundryID = $_GET['id'];

// get all price tags
$pricesql = 'SELECT pricelist.id, pricelist.description, pricelist.Price FROM pricelist';
$pricingResult = mysqli_query($conn, $pricesql);

// get name of currently logged in admin
if (isset($_SESSION['adminID'])) {
    $adminID = $_SESSION['adminID'];
}
?>
<div class="form-container">
    <div class="form-wrap">
        <h2>NEW LAUNDRY ITEM</h2>
        <form class="form" method="POST" action="includes/item.inc.php">
            <label for="itemName">Item Name</label>
            <input type="text" for="itemName" name="itemName" required>
            <label for="itemQuantity">Quantity</label>
            <input type="number" for="itemQuantity" name="itemQuantity" required>
            <label for="itemPrice">Price Per Item</label>
            <select placeholder="Price per unit" name="itemPrice">
                <?php
                if (mysqli_num_rows($pricingResult) > 0) {
                    while ($row = mysqli_fetch_assoc($pricingResult)) {
                        $description = $row['description'];
                        $price = $row['Price'];

                ?>
                        <option value=<?php echo $price; ?>><?php echo $description; ?> -- <?php echo $price; ?></option>
                <?php }
                } ?>
            </select>
            <input type="text" name="adminID" value="<?php echo $adminID; ?>" style="display:none" />
            <input type="text" name="laundryID" value="<?php echo $laundryID; ?>" style="display:none" />
            <button type="submit" name="new_item_submit"> Add Item </button>
        </form>
    </div>
</div>