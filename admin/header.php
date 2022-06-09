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
        <a href="">ADMIN</a>
        <div>
            <?php if (isset($_SESSION['adminID'])) { ?>
                <a href="/LaundryMgtApp/admin/laundry_listing.php">Laundry List</a>
                <a href="/LaundryMgtApp/admin/clients.php">Clients</a>
                <a href="/LaundryMgtApp/admin/newLaundry.php" id="newLaundry"><span>&plus;</span> New Laundry</a>
                <a href="/LaundryMgtApp/admin/price_settings.php">Price Settings</a>
                <a href="/LaundryMgtApp/admin/payment.php">payments</a>
                <a href="/LaundryMgtApp/admin/report.php">Reports</a>
                <a href="/LaundryMgtApp/admin/admin.php">Manage Admin</a>
                <form id="logoutForm" method="post" action="includes/logout.inc.php">
                    <button id="logoutbtn" type="submit" name="logout-submit">logout</a>
                </form>
            <?php } else { ?>

                <a href="/LaundryMgtApp">Client's portal</a>
            <?php } ?>
        </div>
    </nav>