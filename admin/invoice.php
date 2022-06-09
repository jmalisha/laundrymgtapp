<?php
require('./header.php');
if (!isset($_SESSION['clientID'])) {
    header("Location: login.php");
    die();
}
require_once('../connection.php');

// select all laundry data for the client
$laundrySql = "SELECT pricelist.description, pricelist.Price, pricelist.adminID ,laundry.date, laundry.laundrystatus,laundry.laundryID,laundry.quantity , admin.adminName,client.username,client.laundrycompleted, admin.phone from pricelist INNER JOIN laundry on laundry.description = pricelist.description INNER JOIN client ON laundry.clientID = client.clientID INNER JOIN admin ON laundry.adminID = admin.adminID WHERE client.clientID =" . $_SESSION['clientID'] . " ORDER BY laundry.date DESC";
$laundryResult = mysqli_query($conn, $laundrySql);
?>
<!--  -->
<!--  -->
<?php
if (mysqli_num_rows($laundryResult) > 0) {
    while ($row = mysqli_fetch_assoc($laundryResult)) {
        $laundryDate =  $row['date'];
        $laundryStatus =  $row['laundrystatus'];
        $desc =  $row['description'];
        $laundryCompleted =  $row['laundrycompleted'];
        $adminName =  $row['adminName'];
        $adminPhone =  $row['phone'];
        $quantity = $row['quantity'];
        $Price = $row['Price'];
?>
        <div class="wrapper">
            <div class="wrapper-item">
                <div class="item-img">
                    <div class="content">
                        <h2 class="content-title" style="color: white">Laundries Completed : <?php echo $laundryCompleted ?></h2>
                        <p class="content-date" style="color: white">Served By : <?php echo $adminName ?></p>
                        <p class="content-date" style="color: white">Phone no. : 0<?php echo $adminPhone ?></p>
                        <p class="content-date" style="color: white">Price. : <?php $Price = $quantity * $Price ?><?php echo $Price ?></p>
                        <p class="content-date" style="color: white">quantity. :<?php echo $quantity ?></p>
                    </div>
                </div>
                <div class="content-wrapper">
                    <span class="content-date">Laundry done on <?php echo $laundryDate ?></span>
                    <div class="content-title"><?php echo $laundryStatus ?></div>
                    <div class="content-text"> <?php echo $desc ?> </div>
                </div>
            </div>
        </div>
        <br />
    <?php
    }
} else { ?>
    <div class="clientcontainer">
        <p>
            No Laundry data found 😅.
        </p>
        <p>
            The laundry data will be visible to you once you start your laundry service
            with us
        </p>
    </div>
<?php } ?>
<?php include('./footer.php') ?>