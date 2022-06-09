<?php
session_start();

// connect to db

$db = mysqli_connect('localhost', 'root', '', 'laundrydb');

if (isset($_POST['pay_submit'])) {
    $Shotcode = "797908";
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $raw_amount = $_POST['amount'];
    $amount = (int)$raw_amount;

    if (empty($Shotcode) || empty($username) || empty($raw_amount) || empty($phone) || empty($amount)) {
        header('Location:../index.php?error=empty fields');
        exit();
    } else {

        $curl = curl_init();
        // $pay_amount = $amount;
        // $pay_phone = $username;

        echo $amount;
        //echo $username;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.albella.co/live/pay/pay_laundry",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\r\n    \"amount\":$amount,\r\n    \"phone\": \"$phone\"\r\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        //After successfull Mpesa transaction insert data into the db
        mysqli_query($db, "INSERT INTO payment (Shotcode, username, amount ) VALUES ('$Shotcode', '$username', '$amount')");
        $_SESSION['message'] = "payments complted ";

        header('location: ../index.php?message=pending');
    }

    // $someObject = json_decode($response);
    // print_r($someObject);
    // echo $someObject[0]->success;

    //
}
