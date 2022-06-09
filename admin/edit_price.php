<?php require('./header.php');
if (!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    die();
}
// db connection
require('../connection.php');

// get all users from db
$sql = 'SELECT pricelist.id, pricelist.description FROM pricelist';
$pricing = mysqli_query($conn, $sql);
// get name of currently logged in admin
if (isset($_SESSION['adminID'])) {
    $adminID = $_SESSION['adminID'];
}
?>
<div class="form-container">
    <div class="form-wrap">
        <h2>Edit Price Tag</h2>
        <form class="form" method="POST" action="includes/editprice.inc.php">
            <label for="clientID">Select price tag</label>
            <select placeholder="Price Tag" name="priceID">
                <?php
                if (mysqli_num_rows($pricing) > 0) {
                    while ($row = mysqli_fetch_assoc($pricing)) {
                        $priceID = $row['id'];
                        $description = $row['description'];
                ?>
                        <option value=<?php echo $priceID; ?>><?php echo $description; ?></option>
                <?php }
                } ?>
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" placeholder="quantity" required="This field is required" />
                <label for="price">Price</label>
                <input type="text" name="price" placeholder="Price" required="This field is required" />
                <input type="text" name="adminID" value="<?php echo $adminID; ?>" style="display:none" />
                <button type="submit" name="edit_price"> Save changes </button>
        </form>
    </div>
</div>