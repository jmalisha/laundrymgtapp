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
        <div class="form">
            <a href="/LaundryMgtApp/admin/addprice.php">
                <button type="text" name="add_submit"> Add Price Tag </button>
            </a>
        </div>
        <div class="form">
            <a href="/LaundryMgtApp/admin/edit_price.php">
                <button type="submit" name="add_submit"> Edit Price Tag </button>
            </a>
        </div>

    </div>
</div>