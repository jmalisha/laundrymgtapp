<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandingPage</title>
    <link rel="stylesheet" type="text/css" href="./styles/app.css" />
    <link rel="stylesheet" type="text/css" href="./styles/landing.css" />
</head>

<body>

    <div class="container">
        <div class="overlay"></div>
        <div class="landing">
            <h1>Welcome to Executive Laundry</h1>
            <p>
                A Personal and Professional Cleaning service.
            </p>
            <div class="button-group">
                <button><a href="/laundrymgtapp/client/register.php">Signup</a></button>
                <button><a href="/laundrymgtapp/client/login.php">Login</a></button>
                <!-- <button>
                    <a href="">logged in as ...</a>
                </button> -->
                <!-- <button><a href="/logout">Logout</a></button> -->
            </div>
        </div>
        <div class="contact-info">
            <div class="form">
                <h2>Contact Us</h2>
                <form action="mailto:joycemalisha22@gmail.com" method="get" enctype="text/plain">
                    <textarea rows="3" placeholder="message"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.951818712586!2d36.90746645043781!3d-1.194135535865397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f3e4d15df43fd%3A0xd3dbd29f911a6971!2sLaundry%20Services!5e0!3m2!1sen!2ske!4v1588669100529!5m2!1sen!2ske" width="400" height="250" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <p id="adminLink">&copy; 2020 | <a href="/LaundryMgtApp/admin/login.php">admin</a></p>
</body>

</html>