<?php
if (isset($_GET['login_submit'])) {
    // add database
    require('../../connection.php');

    // Get data from db
    $username = $_GET['username'];
    $password = $_GET['password'];

    // check if field is empty
    if (empty($username) || empty($password)) {
        header('Location:../login.php?error=emptyfields');
        exit();
    } else {
        $sql = "SELECT * FROM client WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:../login.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row["password"]);
                if ($pwdCheck == false) {
                    header('Location:../login.php?error=wrongpassword');
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['clientID'] = $row['clientID'];
                    header('Location:../index.php?login=success');
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
