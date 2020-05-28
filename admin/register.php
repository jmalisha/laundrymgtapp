<?php include_once("./header.php") ?>
<div class="form-container">
    <div class="form-wrap">
        <h2>Register</h2>
        <div class="form">
            <input type="text" placeholder="Username" name="adminName" />
            <input type="email" placeholder="Email" name="email" />
            <input type="tel" placeholder="Phone number" name="phone" />
            <input type="password" placeholder="Password" name="password" />
            <button> Sign in </button>
            <a href="/LaundryMgtApp/admin/login.php">
                <p> Already Registered? Login </p>
            </a>
        </div>
    </div>
</div>
<?php include_once("./footer.php") ?>