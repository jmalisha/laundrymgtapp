<?php
require_once('../connection.php');

// get all laundry data
$laundrySql = 'SELECT laundry.date, laundry.laundrystatus, laundry.description FROM `laundry` WHERE laundry.clientID = 1';
$laundryResult = mysqli_query($conn, $laundrySql);
?>
<?php include('./header.php') ?>
<!-- <div class="clientcontainer">
    <p>
        No Laundry data found 😅.
    </p>
    <p>
        The laundry data will be visible to you once you start your laundry service
        with us
    </p>
</div> -->
<?php
if (mysqli_num_rows($laundryResult) > 0) {
    while ($row = mysqli_fetch_assoc($laundryResult)) {
        $laundryDate =  $row['date'];
        $laundryStatus =  $row['laundrystatus'];
        $desc =  $row['description'];

?>
        <div class="wrapper">
            <div class="wrapper-item">
                <div class="item-img">
                    <div class="content">
                        <h2 class="content-title" style="color: white">Laundries Completed : 23</h2>
                        <p class="content-date" style="color: white">Served By : Lucky Dub</p>
                        <p class="content-date" style="color: white">Phone no. : 0712345769</p>
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
} ?>
<?php include('./footer.php') ?>