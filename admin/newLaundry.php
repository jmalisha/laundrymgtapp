<?php require('./header.php');
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
<form class="form newLaundry" method="POST" action="includes/new.inc.php">
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
    <select placeholder="laundry status" name="laundryStatus">
        <option value="complete">complete</option>
        <option value="in progress">in progress</option>
    </select>
    <textarea placeholder="description" name="description"></textarea>
    <input type="text" name="adminID" value="<?php echo $adminID; ?>" />
    <button type="submit" name="new_laundry_submit"> Sign in </button>
    <a href="/LaundryMgtApp/admin/register.php">
        <p> Don't have an account? Register </p>
    </a>
</form>