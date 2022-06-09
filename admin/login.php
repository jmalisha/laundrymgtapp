<?php require("./header.php") ?>
<div class="form-container">
    <div class="form-wrap">
        <h2>Login</h2>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET['error'] == 'emptyfields') {
                echo '<p class="authError">Fill in all fields!</p>';
            } else if ($_GET['error'] == 'wrongpassword') {
                echo '<p class="authError">Invalid password!</p>';
            } else if ($_GET['error'] == 'nouser') {
                echo '<p class="authError">Invalid username!</p>';
            }
        }
        ?>
        <form class="form" method="GET" action="includes/login.inc.php">
            <input type="text" placeholder="Username" name="adminName" />
            <input type="password" placeholder="Password" name="password" />
            <button type="submit" name="login_submit"> Sign in </button>

        </form>
    </div>
</div>
<?php include_once("./footer.php") ?>