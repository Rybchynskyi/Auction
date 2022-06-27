<?php
    require_once '../config/connect.php';
    $bid = $_POST['bid'];
    $bids_name = $_POST['name'];
    $bids_contact = $_POST['email'];
    $bids_time = "2022-06-27 13:37:22";

    mysqli_query($connect, "INSERT INTO `bid_list` (`bid_id`,`name`, `bid`, `bid_time`, `bid_contact`) VALUES (NULL, '$bids_name', '$bid', '$bids_time', '$bids_contact')");
    header('Location: ../index.php');
?>