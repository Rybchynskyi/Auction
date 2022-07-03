<?php
    date_default_timezone_set('Europe/Kiev');
    require_once '../config/connect.php';


// take currency
$currency = mysqli_query($connect,"SELECT `currency` FROM `currency`");
$currency = mysqli_fetch_array($currency);
$currency = $currency['currency'];

// change bid to UAH
function get_user_lang () {
    return isset($_COOKIE["lang"]) ? $_COOKIE["lang"] :'ua';
}

// isset bid
if (!isset($_POST['bid'])) {
    header('Location: ../index.php?info=err_nobid');
}

// get bid in UAH
$language = get_user_lang ();
$bid = (float)$_POST['bid'];
if ($language === 'en') {
//    $bid = (float)$_POST['bid'] * $currency;
    $bid *= $currency;
}

// SQL get MAX-BID
$max_bid = mysqli_query($connect, "SELECT MAX(Bid) FROM bid_list");
$max_bid = mysqli_fetch_array($max_bid);
$max_bid = $max_bid["MAX(Bid)"];

// Bid info from post
$bids_name = htmlspecialchars($_POST['name']);
$bids_contact = htmlspecialchars($_POST['email']);
$bids_phone = htmlspecialchars($_POST['phone']);
$show_bids_name = htmlspecialchars($_POST['show_my_name']);
$bids_time = date("Y-m-d H:i:s");
$pagefrom = htmlspecialchars($_POST['page_from']);


// setcookie
setcookie("name", $bids_name, time() + 14 * 86400, "/");
setcookie("email", $bids_contact, time() + 14 * 86400, "/");
setcookie("phone", $bids_phone, time() + 14 * 86400, "/");

    if ($bid >$max_bid) {
        mysqli_query($connect, "INSERT INTO `bid_list` (`bid_id`,`name`, `bid`, `bid_time`, `bid_contact`, `bid_phone`, `show_my_name`) VALUES (NULL, '$bids_name', '$bid', '$bids_time', '$bids_contact', '$bids_phone', '$show_bids_name')");

        /// for teleg
        $bid_ua = number_format($bid, 2, ',', ' ' );
        $bid_en = number_format($bid / $currency, 2, ',', ' ' );
        $message = "Добродій " . $bids_name . " підвищив ставку до: " . $bid_ua . " грн. %0A %0A" . $bids_name . " raised the rate to: " . $bid_en . "$";
//        $telegram_send = fopen("https://api.telegram.org/bot5430503074:AAHdewxbqqwDt_03y-IwNRvDK5ARkIaNtVY/sendMessage?chat_id=-678534217&text=$message", "r");
        header('Location: ../'.$pagefrom.'.php?info=success');
    }

    else {
        header('Location: ../index.php?info=failed');
    }
?>