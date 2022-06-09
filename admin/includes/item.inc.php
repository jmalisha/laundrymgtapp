<?php
if (isset($_POST['new_item_submit'])) {
    // connect to db
    require('../../connection.php');

    // get form data
    $raw_price = $_POST['itemPrice'];
    $laundryID = $_POST['laundryID'];
    $adminID = $_POST['adminID'];
    $itemName = $_POST['itemName'];
    $unitPrice = (int)$raw_price;
    $quantity = $_POST['itemQuantity'];

    $price = $unitPrice * $quantity;


    // check if fields are empty
    if (empty($laundryID) || empty($itemName) || empty($quantity) || empty($price) || empty($adminID)) {
        header('Location: ../laundryItem.php?error=emptyfields&uid=' . $adminName . "&mail=" . $email);
        exit();
    } else {
        // insert new laundry data to db
        $sql = "INSERT INTO laundryitem (laundryID, itemName, quantity , price) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:../laundryItem.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'ssii', $laundryID, $itemName, $quantity, $price);
            mysqli_stmt_execute($stmt);
            header("Location:../viewlaundry.php?id=$laundryID");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header('Location: ./laundry.php');
    exit();
}
