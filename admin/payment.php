<?php
require('./header.php');
if (!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    die();
}

?>
<div class="table-area">


    <?php


    $mysqli = new mysqli("localhost", "root", "", "laundrydb");

    // Check connection
    if ($mysqli === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

    // Attempt select query execution
    $sql = "SELECT * FROM payment ORDER BY payment.Transdate DESC";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            echo "<table class='admin-table'>";
            echo "<tr>";
            echo "<th class='table-head'>ID</th>";
            echo "<th class='table-head'>Usename</th>";
            echo "<th class='table-head'>TransAmount</th>";
            echo "<th class='table-head'>shortcode</th>";
            echo "<th class='table-head'>TransTime</th>";

            echo "</tr>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td class='table-head'>" . $row['id'] . "</td>";
                echo "<td class='table-head'>" . $row['username'] . "</td>";
                echo "<td class='table-head'>" . $row['amount'] . "</td>";
                echo "<td class='table-head'>" . $row['Shotcode'] . "</td>";
                echo "<td class='table-head'>" . $row['Transdate'] . "</td>";


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