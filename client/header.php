<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laundry Mgt App</title>
    <link rel="stylesheet" href="../styles/app.css" type="text/css">
    <link rel="stylesheet" href="../styles/client/client.css" type="text/css">
    <link rel="stylesheet" href="../styles/client/login.css" type="text/css">
    <link rel="stylesheet" href="../styles/admin/laundries.css" type="text/css">
    <link rel="stylesheet" href="../styles/landing.css" type="text/css">

</head>

<body>
    <nav>
        <a href="/LaundryMgtApp">LaundryMgtApp</a>
        <div>
            <?php if (isset($_SESSION['clientID'])) { ?>
                <a href="pricelist.php">Price List</a>
                <form id="logoutForm" method="post" action="includes/logout.inc.php">
                    <button id="logoutbtn" type="submit" name="logout-submit">logout</a>
                </form>
            <?php } else { ?>
                <a href="/laundrymgtapp/client/register.php">Signup</a>
                <a href="/laundrymgtapp/client/login.php">Login</a>
            <?php } ?>
        </div>
    </nav>