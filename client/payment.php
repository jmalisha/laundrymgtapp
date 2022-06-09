<?php session_start();

$AMOUNT = $_GET['amount'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laundry Mgt App</title>
    <link rel="stylesheet" href="../styles/app.css" type="text/css">
    <link rel="stylesheet" href="../styles/client/client.css" type="text/css">
    <link rel="stylesheet" href="../styles/admin/laundries.css" type="text/css">
    <link rel="stylesheet" href="../styles/landing.css" type="text/css">
    <link rel="stylesheet" href="../styles/client/login.css" type="text/css">
    <script src="jquery-3.4.1.min.js" type="text/javascript"></script>
</head>

<body>
    <nav>
        <a href="index.php">LaundryMgtApp</a>
        <div>
            <?php if (isset($_SESSION['clientID'])) { ?>
                <a href="pricelist.php"> Price List</a>
                <a href="payment.php">Payment</a>
                <form id="logoutForm" method="post" action="includes/logout.inc.php">
                    <button id="logoutbtn" type="submit" name="logout-submit">logout</a>
                </form>
            <?php } else { ?>
                <a href="/register">Signup</a>
                <a href="/login">Login</a>
            <?php } ?>
        </div>
    </nav>

    <div class="form-container">
        <h2>Payment Instructions </h2><br>
        <ul>
            <li>Enter amount KES</li>
            <li>Enter You Name</li>
            <li>Enter You Mobile No.</li>

        </ul><br>
        <hr>

        <div class="form-wrap">
            <h2>Pay</h2>
            <form class="form" method="POST" action="includes/paypro.php">
                <label for="amount">amount</label>
                <input type="text" name="amount" placeholder="amount" value="<?php echo $AMOUNT; ?>" />
                <label for="username">username</label>
                <input type="text" name="username" placeholder="username" required="This field is required" />
                <label for="phone">Phone Number e.g 07********</label>
                <input type="text" name="phone" placeholder="Phone Number" required="This field is required" />
                <button type="submit" name="pay_submit"> Pay </button>
            </form>
        </div>
    </div>