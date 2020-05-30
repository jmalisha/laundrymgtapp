<?php include_once("./header.php") ?>
<div class="form-container">
    <div class="form-wrap">
        <h2>Login</h2>
        <form class="form" method="GET" action="includes/login.inc.php">
            <input type="text" placeholder="Username" name="adminName" />
            <input type="password" placeholder="Password" name="password" />
            <button type="submit" name="login_submit"> Sign in </button>
            <a href="/LaundryMgtApp/admin/register.php">
                <p> Don't have an account? Register </p>
            </a>
        </form>
    </div>
</div>
<?php include_once("./footer.php") ?>