<?php
session_start();

// connect to db

$db = mysqli_connect('localhost', 'root', '', 'laundrydb');


// initialize variables
$description = "";
$quantity = "";
$price = "";
if (isset($_POST['edit_price'])) {

    $priceID = $_POST['priceID'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $adminID = $_POST['adminID'];

    $sql = "UPDATE pricelist SET price='$price', quantity='$quantity', adminID='$adminID' WHERE pricelist.id = '$priceID'";

    mysqli_query($db, $sql);
    $_SESSION['message'] = "price updated";
    header('location: ../edit_success.php');
}
