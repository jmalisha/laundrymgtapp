<?php
session_start();
?>
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

</head>

<body>
    <nav>
        <a href="/LaundryMgtApp">LaundryMgtApp</a>
        <div>
            <a href="/register">Signup</a>
            <a href="/login">Login</a>
            <a href="">logged in as ...</a>
            <a href="/logout">Logout</a>
        </div>
    </nav>