<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laundry Mgt App</title>
    <link rel="stylesheet" href="../styles/app.css" type="text/css">
    <link rel="stylesheet" href="../styles/client/client.css" type="text/css">
    <link rel="stylesheet" href="../styles/admin/laundries.css" type="text/css">
    <link rel="stylesheet" href="../styles/landing.css" type="text/css">
    <link rel="stylesheet" href="../styles/client/login.css" type="text/css">
    <script src="jquery-3.4.1.min.js" type="text/javascript"></script>
</head>

<body>
    <nav>
        <a href="index.php">LaundryMgtApp</a>
        <div>
            <?php if (isset($_SESSION['clientID'])) { ?>
                <a href="pricelist.php">Price List</a>

                <a href="payment.php">Payment</a>
                <form id="logoutForm" method="post" action="includes/logout.inc.php">
                    <button id="logoutbtn" type="submit" name="logout-submit">logout</a>
                </form>
            <?php } else { ?>
                <a href="/register">Signup</a>
                <a href="/login">Login</a>
            <?php } ?>
        </div>
    </nav>

    <div>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                padding-right: 10px;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
        </head>

        <body>

            <h2 text align="center">Executive Laundry Price List</h2>
            <div class="table-area">
                <?php
                /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */


                $mysqli = new mysqli("localhost", "root", "", "laundrydb");

                // Check connection
                if ($mysqli === false) {
                    die("ERROR: Could not connect. " . $mysqli->connect_error);
                }


                // Attempt select query execution
                $sql = "SELECT * FROM pricelist";
                if ($result = $mysqli->query($sql)) {
                    if ($result->num_rows > 0) {
                        echo "<table class='admin-table'>";
                        echo "<tr>";
                        echo "<th class='table-head'>ID</th>";
                        echo "<th class='table-head'>Item Name</th>";
                        echo "<th class='table-head'>Quantity</th>";
                        echo "<th class='table-head'>Price</th>";
                        echo "</tr>";
                        while ($row = $result->fetch_array()) {
                            echo "<tr>";
                            echo "<td class='table-head'>" . $row['id'] . "</td>";
                            echo "<td class='table-head'>" . $row['description'] . "</td>";
                            echo "<td class='table-head'>" . $row['quantity'] . "</td>";
                            echo "<td class='table-head'>" . $row['Price'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        // Free result set
                        $result->free();
                    } else {
                        echo "No records matching your query were found.";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                }

                // Close connection
                $mysqli->close();
                ?>
            </div>
    </div>