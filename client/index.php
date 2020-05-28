<?php
require_once('../connection.php');

// select all laundry data for the client
$laundrySql = "SELECT laundry.date, laundry.laundrystatus, laundry.description,client.laundrycompleted, admin.adminName, admin.phone FROM ((`laundry` INNER JOIN client ON client.clientID = laundry.laundryID) INNER JOIN admin ON admin.adminID = laundry.adminID) WHERE laundry.clientID = 1";
$laundryResult = mysqli_query($conn, $laundrySql);
?>
<!--  -->
<?php include('./header.php') ?>
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