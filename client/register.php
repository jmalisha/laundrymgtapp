<?php require("./header.php") ?>
<div class="form-container">
    <div class="form-wrap">
        <h2>Register</h2>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET['error'] == 'emptyfields') {
                echo '<p class="authError">Fill in all fields!</p>';
            } else if ($_GET['error'] == 'invalidmailuid') {
                echo '<p class="authError">Invalid username and email!</p>';
            } else if ($_GET['error'] == 'invalidmail') {
                echo '<p class="authError">Invalid email!</p>';
            } else if ($_GET['error'] == 'invaliduid') {
                echo '<p class="authError">Invalid username!</p>';
            } else if ($_GET['error'] == 'passwordcheck') {
                echo '<p class="authError">Your passwords do not match!</p>';
            } else if ($_GET['error'] == 'usertaken') {
                echo '<p class="authError">Username is already taken!</p>';
            }
        }
        ?>
        <form class="form" method="post" action="includes/signup.inc.php">
            <input type="text" placeholder="Username" name="username" />
            <input type="email" placeholder="Email" name="email" />
            <input type="tel" placeholder="Phone number" name="phone" />
            <input type="password" placeholder="Password" name="password" />
            <input type="password" placeholder="Repeat Password" name="rpassword" />
            <button type="submit" name="signup_submit"> Sign Up </button>
            <a href="/LaundryMgtApp/client/login.php">
                <p> Already Registered? Login </p>
            </a>
        </form>
    </div>
</div>
<?php include_once("./footer.php") ?>