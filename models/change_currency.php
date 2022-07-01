<?php

    // DB connect
    require_once '../config/connect.php';

    //change currencu in DB
    $currency = $_POST['new_currency'];

    mysqli_query($connect, "UPDATE currency SET `currency` = '$currency'  WHERE `currency`.`name` = 'USD'");

    header('Location: ../bidlist.php');

?>