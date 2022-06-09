<?php
if (isset($_POST['new_laundry_submit'])) {
    // connect to db
    require('../../connection.php');

    // get form data
    $clientID = $_POST['clientID'];
    $laundryStatus = $_POST['laundryStatus'];
    $description = $_POST['description'];
    $adminID = $_POST['adminID'];

    // check if fields are empty
    if (empty($clientID) || empty($laundryStatus) || empty($description) || empty($adminID)) {
        header('Location: ../newLaundry.php?error=emptyfields&uid=' . $adminName . "&mail=" . $email);
        exit();
    } else {
        // insert new laundry data to db
        $sql = "INSERT INTO laundry (laundryStatus, clientID, adminID, description) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:../newLaundry.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'ssss', $laundryStatus, $clientID, $adminID, $description);
            mysqli_stmt_execute($stmt);
            header('Location:../laundry_listing.php?newLaundry=success');
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header('Location: ./laundry.php');
    exit();
}
