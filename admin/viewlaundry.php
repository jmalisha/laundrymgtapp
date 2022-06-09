<?php require('./header.php');
ini_set("display_errors", 0);
if (!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    die();
}
require_once('../connection.php');

$ID = $_GET['id'];

$sql = "SELECT laundry.clientID, laundry.laundryID, client.username, client.phone, client.email, client.laundrycompleted, laundry.date, laundry.laundrystatus, laundry.description FROM `laundry` INNER JOIN client ON laundry.clientID = client.clientID WHERE laundry.laundryID = '$ID'  ORDER BY laundry.date DESC";

$result = mysqli_query($conn, $sql);

?>

<div class="container">
    <br />
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $clientID =  $row['clientID'];
            $laundryID =  $row['laundryID'];
            $clientName =  $row['username'];
            $clientPhone =  $row['phone'];
            $clientEmail =  $row['email'];
            $laundryCompleted =  $row['laundrycompleted'];
            $laundryDate =  $row['date'];
            $laundryStatus = $row['laundrystatus'];
            $desc =  $row['description'];

    ?>
            <div class="wrapper">
                <div class="wrapper-item">
                    <div class="item-img">
                        <div class="content">
                            <h2 class="content-title" style="color: white"><?php echo $clientName ?></h2>
                            <p class="content-date" style="color: white">Phone : 0<?php echo $clientPhone ?></p>
                            <p class="content-date" style="color: white">email :<?php echo $clientEmail ?></p>
                            <p class="content-date" style="color: white">laundries completed : <?php echo $laundryCompleted ?></p>

                            </p>
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <span class="content-date">Laundry done on <?php echo $laundryDate ?></span>
                        <div class="content-title"><?php echo $laundryStatus ?></div>
                        <div class="content-text"><?php echo $desc ?></div>
                        <?php
                        if (!($laundryStatus == 'complete')) { ?>
                            <form method="post" action="includes/updateLaundry.inc.php?clientID=<?php echo $clientID ?>&laundryID=<?php echo $laundryID ?>">
                                <button style="border: none; cursor: pointer" type="submit" name="status_submit" class="content-button">
                                    complete Laundry
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <br />
            <div class="wrapper">
                <h3>List of Items</h3>
                <div class="wrapper-item">
                    <div class="table-area">
                        <?php
                        $sql2 = "SELECT * FROM laundryitem WHERE laundryitem.laundryID ='$ID' ";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2->num_rows > 0) {
                            echo "<table class='admin-table'>";
                            echo "<tr>";
                            echo "<th class='table-head'>ID</th>";
                            echo "<th class='table-head'>Item Name</th>";
                            echo "<th class='table-head'>Quantity</th>";
                            echo "<th class='table-head'>Price</th>";

                            echo "</tr>";
                            while ($row = $result2->fetch_array()) {
                                echo "<tr>";
                                echo "<td class='table-head'>" . $row['itemId'] . "</td>";
                                echo "<td class='table-head'>" . $row['itemName'] . "</td>";
                                echo "<td class='table-head'>" . $row['quantity'] . "</td>";
                                echo "<td class='table-head'>" . $row['price'] . "</td>";

                                echo "</tr>";
                            }
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else {
                            echo "No records matching your query were found.";
                        }

                        ?>
                    </div>

                </div>
            <?php
        }
    } else { ?>
            <div class="clientcontainer">
                <p>
                    No Laundry data found 😅.
                </p>
                <p>
                    The laundry data will be visible to you once clients start their laundry services.
                </p>
            </div>
        <?php } ?>
        <div class="total-price">
            <?php

            $sql3 = "SELECT  sum(laundryitem.price) AS totalprice FROM laundryitem WHERE laundryitem.laundryID ='$ID' ";
            $result3 = mysqli_query($conn, $sql3);

            if (mysqli_num_rows($result3) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result3)) {

                    $totalprice = $row['totalprice'];
                    echo "<div> <h4>Total Amount:  {$totalprice} </h4></div>";
                }
            } else {
                echo "0 results";
            }

            ?>
        </div>
        <div>
            <a href="/LaundryMgtApp/admin/laundryItem.php?id=<?php echo $ID ?>">
                <button class="adminbutton">Add Item</button>
            </a>
        </div>
            </div>

            <?php include_once('./footer.php') ?>