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
        <a href="/LaundryMgtApp/admin/price_settings.php">Price settings</a>
        <a href="/LaundryMgtApp/admin/payment.php">payments</a>
        <a href="/LaundryMgtApp/admin/report.php">Reports</a>
        <a href="/LaundryMgtApp/admin/admin.php">Manage Admin</a>
        <form id="logoutForm" method="post" action="includes/logout.inc.php">
          <button id="logoutbtn" type="submit" name="logout-submit">logout</a>
        </form>
      <?php }  ?>
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
    <h4> Laundries Report</h4>
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

        ol {
          color: black;
          font-size: 25px;

        }
      </style>
      <p>

        <ol>
          <li>General clothes cleaning: These are items such as jeans, trousers, shorts, dresses, skirts, shirts, blouses, T-shirts, gym kits, pajamas, towels, sweaters, jackets and more.</li><br>
          <li>Cleaning of beddings: This includes duvets, bed sheets, blankets, mattress covers, pillow cases, and mosquito nets.</li><br>
          <li>Cleaning household textiles: This covers items such as curtains, drapers, seat covers, and table cloths.</li>


        </ol>
      </p>

    </div>