<?php require('./header.php');
if (!isset($_SESSION['clientID'])) {
    header("Location: login.php");
    die();
}
// db connection
require('../connection.php');

// get all users from db
$sql = 'SELECT client.clientID, client.username FROM client';
$usersResult = mysqli_query($conn, $sql);
// get name of currently logged in admin
if (isset($_SESSION['clientID'])) {
    $clientID = $_SESSION['clientID'];
}
?>
<div class="form-container">
    <div class="form-wrap">
        <h2>NEW LAUNDRY</h2>
        <form class="form" method="POST" action="test.php">
            <label for="clientID">Client Name</label>
            <select placeholder="client Name" name="clientID">
                <?php
                if (mysqli_num_rows($usersResult) > 0) {
                    while ($row = mysqli_fetch_assoc($usersResult)) {
                        $username = $row['username'];
                        $clientID = $row['clientID'];
                ?>
                        <option value=<?php echo $clientID; ?>><?php echo $username; ?></option>
                <?php }
                } ?>
            </select>
            <input type="text" placeholder="InvoiceNumber" name="InvoiceNumber" />
            <input type="text" placeholder="ShortCode" name="BusinessShortCode" />
            <input type="text" placeholder="Amount" name="TransAmount" />
            <input type="text" placeholder="Phone Number" name="MSISDN" />
            <input type="text" name="clientID" value="<?php echo $clientID; ?>" style="display:none" />
            <button type="submit" name="Pay_submit"> Pay </button>
        </form>
    </div>
</div>