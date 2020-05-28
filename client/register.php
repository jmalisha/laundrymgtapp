<?php include_once("./header.php") ?>
<div class="form-container">
    <div class="form-wrap">
        <h2>Register</h2>
        <form class="form" method="post" action="includes/signup.inc.php">
            <input type="text" placeholder="Username" name="username" />
            <input type="email" placeholder="Email" name="email" />
            <input type="tel" placeholder="Phone number" name="phone" />
            <input type="password" placeholder="Password" name="password" />
            <input type="password" placeholder="Repeat Password" name="rpassword" />
            <button type="submit" name="signup_submit"> Sign in </button>
            <a href="/LaundryMgtApp/client/login.php">
                <p> Already Registered? Login </p>
            </a>
        </form>
    </div>
</div>
<?php include_once("./footer.php") ?>