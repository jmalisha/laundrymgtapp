<?php
if (isset($_POST['signup_submit'])) {
    // connect to db
    require('../../connection.php');

    // get form data
    $adminName = $_POST['adminName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    // check if fields are empty
    if (empty($adminName) || empty($email) || empty($phone) || empty($password) || empty($rpassword)) {
        header('Location: ../register.php?error=emptyfields&uid=' . $adminName . "&mail=" . $email);
        exit();
    }
    // check both mail and adminName error
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $adminName)) {
        header('Location:../register.php?error=invalidmailuid');
        exit();
    }
    // check email validation
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location:../register.php?error=invalidmail&uid=' . $adminName);
        exit();
    }
    // check adminName validation
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $adminName)) {
        header("Location: ../register.php?error=invaliduid&mail=" . $email);
        exit();
    }
    // Phone number validation
    else if (!preg_match("/^[0-9]*$/", $phone)) {
        header('Location:../register.php?error=numberrequired');
        exit();
    }
    // check password requirement
    else if (!preg_match("/^\S{8,}$/i", $password)) {
        header('Location:../register.php?error=passwordweak');
        exit();
    }
    // check if password and password repeat match
    else if ($password !== $rpassword) {
        header('Location: ../register.php?error=passwordcheck&uid=' . $adminName . "&mail=" . $email);
        exit();
    } else {
        $sql = 'SELECT adminName FROM admin WHERE adminName=?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:../register.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $adminName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header('Location:../register.php?error=usertaken&mail' . $email);
                exit();
            } else {
                // insert userdata to db
                $sql = "INSERT INTO admin (adminName, email, phone, password) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location:../register.php?error=sqlerror');
                    exit();
                } else {
                    // hash password
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'ssss', $adminName, $email, $phone, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header('Location:../admin.php?register=success');
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
