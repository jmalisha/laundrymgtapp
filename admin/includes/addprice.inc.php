<?php
session_start();

// connect to db

$db = mysqli_connect('localhost', 'root', '', 'laundrydb');


// initialize variables
$description = "";
$quantity = "";
$price = "";
if (isset($_POST['add_submit'])) {
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $adminID = $_POST['adminID'];

    mysqli_query($db, "INSERT INTO pricelist (description, quantity, price, adminID) VALUES ('$description', '$quantity', '$price','$adminID')");
    $_SESSION['message'] = "price saved";
    header('location: ../add_success.php');
}
