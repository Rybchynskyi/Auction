<?php
    date_default_timezone_set('Europe/Kiev');
    require_once '../config/connect.php';

    $bid = $_POST['bid'];
    $bids_name = $_POST['name'];
    $bids_contact = $_POST['email'];
    $bids_phone = $_POST['phone'];
    $show_bids_name = $_POST['show_my_name'];
    $bids_time = date("Y-m-d H:i:s");
    $pagefrom = $_POST['page_from'];

    setcookie("name", $bids_name, time() + 14 * 86400, "/auction/auction");
    setcookie("email", $bids_contact, time() + 14 * 86400, "/auction/auction");
    setcookie("phone", $bids_phone, time() + 14 * 86400, "/auction/auction");

    mysqli_query($connect, "INSERT INTO `bid_list` (`bid_id`,`name`, `bid`, `bid_time`, `bid_contact`, `bid_phone`, `show_my_name`) VALUES (NULL, '$bids_name', '$bid', '$bids_time', '$bids_contact', '$bids_phone', '$show_bids_name')");



    if ($pagefrom == "bidlist") {
        header('Location: ../bidlist.php');
    }
    else {
        header('Location: ../index.php');
    }
?>