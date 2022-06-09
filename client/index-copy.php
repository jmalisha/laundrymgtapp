<?php
require('./header.php');
if (!isset($_SESSION['clientID'])) {
    header("Location: login.php");
    die();
}
require_once('../connection.php');

// select all laundry data for the client
$laundrySql = "SELECT laundry.date, laundry.laundrystatus, laundry.description,client.laundrycompleted, admin.adminName, admin.phone, sum(laundryitem.quantity) AS totalquantity, sum(laundryitem.price) AS totalprice FROM ((`laundry` INNER JOIN client ON laundry.clientID = client.clientID) INNER JOIN admin ON laundry.adminID = admin.adminID INNER JOIN laundryitem ON laundry.laundryID = laundryitem.laundryID) WHERE client.clientID =" . $_SESSION['clientID'] . " ORDER BY laundry.date DESC";
$laundryResult = mysqli_query($conn, $laundrySql);
?>
<!--  -->
<!--  -->


<?php
/*function returns the number of rows in a result set. */
if (mysqli_num_rows($laundryResult) > 0) {
    while ($row = mysqli_fetch_assoc($laundryResult)) {
        $laundryDate =  $row['date'];
        $laundryStatus =  $row['laundrystatus'];
        $desc =  $row['description'];
        $laundryCompleted =  $row['laundrycompleted'];
        $adminName =  $row['adminName'];
        $adminPhone =  $row['phone'];
        $totalquantity = $row['totalquantity'];
        $totalprice =  $row['totalprice'];
?>
        <div class="wrapper">
            <div class="wrapper-item">
                <div class="item-img">
                    <div class="content">
                        <h2 class="content-title" style="color: white">Laundries Completed : <?php echo $laundryCompleted ?></h2>
                        <p class="content-date" style="color: white">Served By : <?php echo $adminName ?></p>
                        <p class="content-date" style="color: white">Phone no. : 0<?php echo $adminPhone ?></p>
                    </div>
                </div>
                <div class="content-wrapper">
                    <span class="content-date">Laundry done on <?php echo $laundryDate ?></span>
                    <div class="content-title">Total Quantity: <?php echo $totalquantity ?></div>
                    <div class="content-title">Total Amount: <?php echo $totalprice ?></div>
                    <div class="content-title">Status: <?php echo $laundryStatus ?></div>
                    <div class="content-text"> <?php echo $desc ?> </div>
                    <div>
                        <a href="/LaundryMgtApp/client/payment.php?amount=<?php echo $totalprice ?>">
                            <button class="paymentbutton">Make Payment</button>
                        </a>
                        <a href="/LaundryMgtApp/client/payment.php?amount=<?php echo $totalprice ?>">
                            <button class="adminbutton">View details</button>
                        </a>
                    </div>
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