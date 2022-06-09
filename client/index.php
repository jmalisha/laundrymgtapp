<?php
require("./header.php");
if (!isset($_SESSION['clientID'])) {
    header("Location: login.php");
    die();


    require_once('../connection.php');
}
?>
<div>
    <div>
        <h2 class="pagetitle">List of Laundries</h2>


        <div class="table-area">
            <?php

            $mysqli = new mysqli("localhost", "root", "", "laundrydb");

            if ($mysqli === false) {
                die("ERROR: Could not connect. " . $mysqli->connect_error);
            }

            $sql = "SELECT laundry.laundryID, laundry.date, laundry.laundrystatus, laundry.description, client.laundrycompleted, client.username, admin.adminName, admin.phone FROM ((`laundry` INNER JOIN client ON laundry.clientID = client.clientID) INNER JOIN admin ON laundry.adminID = admin.adminID INNER JOIN laundryitem ON laundry.laundryID = laundryitem.laundryID) WHERE client.clientID =" . $_SESSION['clientID'] . " ORDER BY laundry.date DESC";

            if ($result = $mysqli->query($sql)) {
                if ($result->num_rows > 0) {
                    echo "<table class='admin-table'>";
                    echo "<tr>";
                    echo "<th class='table-head'>ID</th>";
                    echo "<th class='table-head'>Client</th>";
                    echo "<th class='table-head'>Description</th>";
                    echo "<th class='table-head'>Status</th>";
                    echo "<th class='table-head'>Date</th>";
                    echo "<th class='table-head'>Action</th>";

                    echo "</tr>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                        echo "<td class='table-head'>" . $row['laundryID'] . "</td>";
                        echo "<td class='table-head'>" . $row['username'] . "</td>";
                        echo "<td class='table-head'>" . $row['description'] . "</td>";
                        echo "<td class='table-head'>" . $row['laundrystatus'] . "</td>";
                        echo "<td class='table-head'>" . $row['date'] . "</td>";
                        echo "<td class='table-head'><a href='/LaundryMgtApp/client/invoice_detail.php?id={$row['laundryID']}'>
            <button class='detailbutton'>View details</button> 
          </a></td>";



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

            ?>

        </div>

        <?php include_once("./footer.php") ?>