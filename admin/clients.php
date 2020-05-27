<?php
require_once('../connection.php');
// select data from db
$userSql = "SELECT client.clientID, client.laundrycompleted, client.username, client.phone, client.email from client";
$userResult = mysqli_query($conn, $userSql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../styles/app.css" />
    <link rel="stylesheet" type="text/css" href="../styles/admin/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../styles/admin/client.css" />
</head>

<body>
    <nav>
        <a href="/LaundryMgtApp">ADMIN</a>
        <div>
            <a href="/LaundryMgtApp/admin/laundries.php">Laundries</a>
            <a href="/LaundryMgtApp/admin/clients.php">Clients</a>
            <a href="/logout">Logout</a>
        </div>
    </nav>
    <h1 style="text-align:center">Clients</h1>
    <br />
    <?php
    if (mysqli_num_rows($userResult) > 0) {
        while ($row = mysqli_fetch_assoc($userResult)) {
            $clientID = $row['clientID'];
            $laundryCompleted =  $row['laundrycompleted'];
            $clientName =  $row['username'];
            $clientPhone =  $row['phone'];
            $clientEmail =  $row['email'];
    ?>
            <div class="wrapper">
                <div class="wrapper-item">
                    <div class="item-img">
                        <div class="content">
                            <h2 class="content-title"><?php echo $clientName ?></h2>
                            <p class="content-date">Phone : 0<?php echo $clientPhone ?></p>
                            <p class="content-date">email : <?php echo $clientEmail ?></p>
                            <p class="content-date">laundries completed : <?php echo $laundryCompleted ?></p>
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <div class="content-title">Laundry list</div>
                        <div class="content-text">
                            <!--  -->
                            <?php
                            // query
                            $laundrySql = "SELECT laundry.laundryID, laundry.date, laundry.description FROM `laundry` WHERE laundry.clientID = $clientID";
                            $laundryResult = mysqli_query($conn, $laundrySql);
                            if (mysqli_num_rows($laundryResult) > 0) {
                                while ($row = mysqli_fetch_assoc($laundryResult)) {
                                    $laundryID =  $row['laundryID'];
                                    $laundryDate =  $row['date'];
                                    $desc =  $row['description'];
                            ?>
                                    <div class="laundry">
                                        <div id="header">
                                            <div class="content-index"><?php echo $laundryID ?></div>
                                            <div class="content-value"><?php echo $laundryDate ?></div>
                                        </div>
                                        <div class="content-key"><?php echo $desc ?></div>
                                    </div>
                            <?php }
                            } ?>
                            <!--  -->
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
    <br />
    <?php include('./footer.php') ?>
</body>

</html>