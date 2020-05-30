<?php
if (isset($_POST['status_submit'])) {
    // add database
    require('../../connection.php');

    // increment client laundryCompleted
    $sql = "UPDATE client SET client.laundrycompleted = client.laundrycompleted+1 WHERE client.clientID =" . $_GET['clientID'];
    // update laundry status
    $sql2 = "UPDATE laundry SET laundry.laundrystatus = 'complete' WHERE laundry.laundryID =" . $_GET['laundryID'];
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    if ($result && $result2) {
        header('Location:../laundries.php?status=updated');
        exit();
    } else {
        echo "sql error" . mysqli_error($conn);;
    }
} else {
    header('Location:../laundries.php');
    exit();
}
