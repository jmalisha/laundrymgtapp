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
            <input type="text" placeholder="Username or email" name="username" />
            <input type="password" placeholder="Password" name="password" />
            <button type="submit" name="login_submit"> Sign in </button>

            <a href="/LaundryMgtApp/client/register.php">
                <p> Don't have an account? Register </p>
            </a>
            <a href="/LaundryMgtApp/client/resetpass.php">
                <p>Forgot password</p>
            </a>
        </form>
    </div>
</div>
<?php include_once("./footer.php") ?>