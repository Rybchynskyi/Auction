<?php
    require_once '../config/connect.php';

    $bid_id = $_POST['bid_id'];
    $bid = $_POST['bid'];
    $bids_name = $_POST['name'];
    $show_bids_name = $_POST['show_my_name'];
    $bids_contact = $_POST['email'];
    $bids_phone = $_POST['phone'];
    $bids_time = "2022-06-27 13:37:22";
    $pagefrom = $_POST['page_from'];

    mysqli_query($connect, "UPDATE `bid_list` SET `bid` = '$bid', `name` = '$bids_name', `show_my_name` = '$show_bids_name',  `bid_contact` = '$bids_contact', `bid_phone` = '$bids_phone', `bid_time` = '$bids_time'  WHERE `bid_list`.`bid_id` = '$bid_id'");

    if ($pagefrom == "bidlist") {
        header('Location: ../bidlist.php');
    }
    else {
        header('Location: ../contacts.php');
    }
?>