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
            <a href="#">
                <button type="text"> Price Added successfully! </button>
            </a>
        </div>

    </div>
</div>