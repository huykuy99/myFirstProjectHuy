<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_SESSION['info_customer']["phone_number"])) {
            header('location:http://localhost/baitapthunhat/home.php');
        }
        //include("header.php");
    ?>

<div class="">adsdasdsadas</div>
</body>
</html>