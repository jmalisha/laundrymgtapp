<?php require('./header.php');
if (!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    die();
}
// db connection
require('../connection.php');

// get all users from db
$sql = 'SELECT client.clientID, client.username FROM client';
$usersResult = mysqli_query($conn, $sql);
// get name of currently logged in admin
if (isset($_SESSION['adminID'])) {
    $adminID = $_SESSION['adminID'];
}
?>
<div class="form-container">
    <div class="form-wrap">
        <h2>NEW LAUNDRY</h2>
        <form class="form" method="POST" action="includes/new.inc.php">
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
            <label for="laundryStatus">Laundry status</label>
            <select placeholder="laundry status" name="laundryStatus">
                <option value="complete">complete</option>
                <option value="in progress">in progress</option>
            </select>
            <label for="desciption">Laundry description</label>
            <textarea id="textarea" placeholder="description" name="description" rows="12" cols="1"></textarea>
            <input type="text" name="adminID" value="<?php echo $adminID; ?>" style="display:none" />
            <button type="submit" name="new_laundry_submit"> Sign in </button>
            <a href="/LaundryMgtApp/admin/register.php">
                <p> Don't have an account? Register </p>
            </a>
        </form>
    </div>
</div>