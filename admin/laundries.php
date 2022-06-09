<?php require('./header.php');
if (!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    die();
}
require('../connection.php');

$sql = "SELECT laundry.clientID, laundry.laundryID, client.username, client.phone, client.email, client.laundrycompleted, laundry.date, laundry.laundrystatus, laundry.description FROM `laundry` INNER JOIN client ON laundry.clientID = client.clientID ORDER BY laundry.date DESC";
$result = mysqli_query($conn, $sql);


?>

<div class="container">
    <h1 style="text-align:center">Laundries</h1>
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

</div>

<?php include_once('./footer.php') ?>