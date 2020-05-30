<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../styles/app.css" />
    <link rel="stylesheet" type="text/css" href="../styles/landing.css" />
    <link rel="stylesheet" type="text/css" href="../styles/client/login.css" />
    <link rel="stylesheet" type="text/css" href="../styles/admin/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../styles/admin/laundries.css" />

</head>

<body>
    <nav>
        <a href="/LaundryMgtApp">ADMIN</a>
        <div>
            <?php if (isset($_SESSION['adminID'])) { ?>
                <a href="/LaundryMgtApp/admin/laundries.php">Laundries</a>
                <a href="/LaundryMgtApp/admin/clients.php">Clients</a>
                <form id="logoutForm" method="post" action="includes/logout.inc.php">
                    <button id="logoutbtn" type="submit" name="logout-submit">logout</a>
                </form>
            <?php } else { ?>
                <a href="/register">Signup</a>
                <a href="/login">Login</a>
            <?php } ?>
        </div>
    </nav>