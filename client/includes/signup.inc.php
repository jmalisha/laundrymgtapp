<?php
if (isset($_POST['signup_submit'])) {
    // connect to db
    require('../../connection.php');

    // get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    // check if fields are empty
    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($rpassword)) {
        header('Location: ../register.php?error=emptyfields&uid=' . $username . "&mail=" . $email);
        exit();
    }
    // check both mail and username error
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header('Location:../register.php?error=invalidmailuid');
        exit();
    }
    // check email validation
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location:../register.php?error=invalidmail&uid=' . $username);
        exit();
    }
    // check username validation
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduid&mail=" . $email);
        exit();
    }
    // check if password and password repeat match
    else if ($password !== $rpassword) {
        header('Location: ../register.php?error=passwordcheck&uid=' . $username . "&mail=" . $email);
        exit();
    } else {
        $sql = 'SELECT username FROM client WHERE username=?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:../register.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header('Location:../register.php?error=usertaken&mail' . $email);
                exit();
            } else {
                // insert userdata to db
                $sql = "INSERT INTO client (username, email, phone, password) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location:../register.php?error=sqlerror');
                    exit();
                } else {
                    // hash password
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'ssss', $username, $email, $phone, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header('Location:../login.php?register=success');
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header('Location: ../register.php');
    exit();
}
