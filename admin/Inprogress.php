<?php session_start();
?>
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

    <div>
      <?php if (isset($_SESSION['adminID'])) { ?>
        <a href="/LaundryMgtApp/admin/laundry_listing.php">Laundries List</a>
        <a href="/LaundryMgtApp/admin/clients.php">Clients</a>
        <a href="/LaundryMgtApp/admin/newLaundry.php" id="newLaundry"><span>&plus;</span> New Laundry</a>
        <a href="/LaundryMgtApp/admin/AddPricelist.php">Add Price List</a>
        <a href="/LaundryMgtApp/admin/payment.php">payments</a>

        <a href="/LaundryMgtApp/admin/report.php">Reports</a>
        <a href="/LaundryMgtApp/admin/admin.php">Manage Admin</a>
        <form id="logoutForm" method="post" action="includes/logout.inc.php">
          <button id="logoutbtn" type="submit" name="logout-submit">logout</a>
        </form>

      <?php } ?>
    </div>
  </nav>
  <style>
    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .main {
      margin-left: 200px;
      /* Same as the width of the sidenav */
      font-size: 20px;
      /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
  </style>


  <div class="sidenav">
    <a href="complete.php">Complete laundries</a>
    <a href="Inprogress.php">In Progress</a>
    <a href="clientreport.php">Clients</a>

  </div>

  <div class="main">
    <h4>Complete Laundries Report</h4>
    <hr>
    <div>
      <style>
        table {
          width: 100%;
        }

        th {
          height: auto;
        }

        th {
          text-align: left;
        }

        th,
        td {
          border-bottom: 1px solid #ddd;
        }
      </style>

      <?php
      /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */


      $mysqli = new mysqli("localhost", "root", "", "laundrydb");

      // Check connection
      if ($mysqli === false) {
        die("ERROR: Could not connect. " . $mysqli->connect_error);
      }


      // Attempt select query execution
      $sql = "SELECT laundry.clientID, laundry.laundryID, client.username, client.phone, client.email, client.laundrycompleted, laundry.date, laundry.laundrystatus, laundry.description FROM `laundry` INNER JOIN client ON laundry.clientID = client.clientID AND laundry.laundrystatus = 'In progress' ORDER BY laundry.date DESC";
      if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
          echo "<table>";
          echo "<tr>";
          echo "<th>clientID</th>";
          echo "<th>username</th>";
          echo "<th>phone</th>";
          echo "<th>email</th>";
          echo "<th>date</th>";
          echo "<th>laundrystatus</th>";
          echo "<th>description</th>";
          echo "</tr>";
          while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row['clientID'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['laundrystatus'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
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