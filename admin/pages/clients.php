<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../../styles/app.css" />
    <link rel="stylesheet" type="text/css" href="../../styles/admin/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../styles/admin/client.css" />
</head>

<body>
    <nav>
        <a href="/LaundryMgtApp">ADMIN</a>
        <div>
            <a href="/LaundryMgtApp/admin">Laundries</a>
            <a href="/LaundryMgtApp/admin/pages/clients.php">Clients</a>
            <a href="/logout">Logout</a>
        </div>
    </nav>
    <div class="wrapper">
        <div class="wrapper-item">
            <div class="content-wrapper">
                <span class="content-date">Laundry completed 27</span>
                <div class="content-title">JOHN DOE</div>
                <div class="content-text">email address</div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <?php include('../footer.php') ?>
</body>

</html>