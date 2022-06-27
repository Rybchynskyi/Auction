<?php
    require_once '../config/connect.php';

    $bid_id = $_POST['bid_id'];
    $bid = $_POST['bid'];
    $bids_name = $_POST['name'];
    $bids_contact = $_POST['email'];
    $bids_time = "2022-06-27 13:37:22";

    mysqli_query($connect, "UPDATE `bid_list` SET `bid` = '$bid', `name` = '$bids_name', `bid_contact` = '$bids_contact', `bid_time` = '$bids_time' WHERE `bid_list`.`bid_id` = '$bid_id'");

    header('Location: ../index.php');
?>