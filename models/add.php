<?php
    date_default_timezone_set('Europe/Kiev');
    require_once '../config/connect.php';


// take currency
$currency = mysqli_query($connect,"SELECT `currency` FROM `currency`");
$currency = mysqli_fetch_array($currency);
$currency = $currency['currency'];

// change bid to UAH
if ($_COOKIE["lang"] === 'en') {
    $bid = $_POST['bid'] * $currency;
}
else {
    $bid = $_POST['bid'];
}




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
    $bid_ua = number_format($bid, 2, ',', ' ' );
    $bid_en = number_format($bid / $currency, 2, ',', ' ' );

    $message = "Добродій " . $bids_name . " підвищив ставку до: " . $bid_ua . " грн. %0A %0A" . $bids_name . " raised the rate to: " . $bid_en . "$";
    $telegram_send = fopen("https://api.telegram.org/bot5430503074:AAHdewxbqqwDt_03y-IwNRvDK5ARkIaNtVY/sendMessage?chat_id=-1001693306616&text=$message", "r");

    if ($pagefrom == "bidlist") {
        header('Location: ../bidlist.php');
    }
    else {
        header('Location: ../contacts.php?info=1');
    }
?>