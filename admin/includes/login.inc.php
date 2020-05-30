<?php
if (isset($_GET['login_submit'])) {
    // add database
    require('../../connection.php');

    // Get data from db
    $adminName = $_GET['adminName'];
    $password = $_GET['password'];

    // check if field is empty
    if (empty($adminName) || empty($password)) {
        header('Location:../login.php?error=emptyfields');
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE adminName=? OR email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:../login.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $adminName, $adminName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row["password"]);
                if ($pwdCheck == false) {
                    header('Location:../login.php?error=wrongpassword');
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['adminID'] = $row['adminID'];
                    header('Location:../laundries.php?login=success');
                    exit();
                } else {
                    header('Location:../login.php?error=wrongpassword');
                    exit();
                }
            } else {
                header('Location:../login.php?error=nouser');
                exit();
            }
        }
    }
} else {
    header('Location:../login.php');
    exit();
}
