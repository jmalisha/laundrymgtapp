<?php require('./header.php');
if (!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    die();
}
// db connection
require('../connection.php');

// get name of currently logged in admin
if (isset($_SESSION['adminID'])) {
    $adminID = $_SESSION['adminID'];
}
?>
<div class="form-container">
    <div class="form-wrap">
        <h2>Add price tag</h2>
        <form class="form" method="POST" action="includes/addprice.inc.php">

            <label for="description">Laundry item description</label>
            <input type="text" name="description" placeholder="description" required="This field is required" />
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" placeholder="quantity" required="This field is required" />
            <label for="price">Price</label>
            <input type="text" name="price" placeholder="Price" required="This field is required" />
            <input type="text" name="adminID" value="<?php echo $adminID; ?>" style="display:none" />
            <button type="submit" name="add_submit"> Add </button>
        </form>
    </div>
</div>