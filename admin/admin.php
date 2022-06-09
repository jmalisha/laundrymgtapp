<?php require("./header.php") ?>
<div>
  <div>
    <h2 class="pagetitle">Manage Admin</h2>


    <div class="table-area">
      <?php

      $mysqli = new mysqli("localhost", "root", "", "laundrydb");

      if ($mysqli === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
      }

      $sql = "SELECT * FROM admin";

      if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
          echo "<table class='admin-table'>";
          echo "<tr>";
          echo "<th class='table-head'>ID</th>";
          echo "<th class='table-head'>Name</th>";
          echo "<th class='table-head'>Email</th>";
          echo "<th class='table-head'>Phone Number</th>";
          echo "<th class='table-head'>Action</th>";

          echo "</tr>";
          while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "<td class='table-head'>" . $row['adminID'] . "</td>";
            echo "<td class='table-head'>" . $row['adminName'] . "</td>";
            echo "<td class='table-head'>" . $row['email'] . "</td>";
            echo "<td class='table-head'>" . $row['phone'] . "</td>";
            echo "<td class='table-head'>" . "</td>";


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
    <div>
      <a href="/LaundryMgtApp/admin/register.php">
        <button class="adminbutton">Add New Admin</button>
      </a>
    </div>

    <?php include_once("./footer.php") ?>