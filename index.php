<?php

// DB connect
require_once 'config/connect.php';

//take currency
$currency = mysqli_query($connect,"SELECT `currency` FROM `currency`");
$currency = mysqli_fetch_array($currency);
$currency = $currency['currency'];

// SQL MAX-BID for ua/en
$max_bid = mysqli_query($connect, "SELECT MAX(Bid) FROM bid_list");
$max_bid = mysqli_fetch_array($max_bid);
$max_bid = $max_bid["MAX(Bid)"];



$num_bids = mysqli_query($connect, "SELECT COUNT(*) FROM bid_list");
$num_bids = mysqli_fetch_array($num_bids);

$bids_history = mysqli_query($connect, "SELECT * FROM bid_list ORDER BY bid_id DESC LIMIT 7");
$bids_history = mysqli_fetch_all($bids_history);



// add header
include 'header.php';

//add menu and active page
include 'menu.php';

// Max bid for USD
if (get_user_lang() === 'en') {
    $max_bid = $max_bid / $currency;
}

// bid or bidS
$var = $num_bids["COUNT(*)"];
$bids_count = $var%10;
$bid_word = ($bids_count > 4) ? $lang['bids'] : $lang['bid'];

// popups
$info = isset($_GET['info']) ? $_GET['info'] : "";
if($info == "success") {
    require_once 'bid_sucess.php';
}
elseif ($info == "failed") {
    require_once 'bid_failed.php';
}
elseif ($info == "err_nobid") {
    require_once 'bid_err_nobid.php';
}

?>
<div class="row d-flex align-items-center justify-content-center my-4">
    <div class="col-sm-7 block-center">
        <div class="px-3">
            <h1 class="text-white mt-4"><?= $lang['site_title_1']?></h1><br>
            <h5 class="lead text-white pb-4"><?= $lang['site_title_2']?> <a class="link" href="#Forwhat"><u><?= $lang['site_title_3']?></u></a></h5>
            <h3 class="text-white my-4"><?= $lang['max_bid']?><? echo number_format($max_bid, 2, ',', ' ' ); ?> <?= $lang['currency']?></h3>
            <p class="lead">
                <button type="button" class="btn btn-success btn-shadow  btn-lg my-4" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i><?= $lang['make_a_bid']?></button>
            </p>
        </div>
    </div>
    <div class="col-sm-5">
        <img src="img/warchip.png" class="rounded mx-auto d-block img-fluid my-4" alt="...">
    </div>
</div>







<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="text-center text-white my-4"><? echo $num_bids["COUNT(*)"]; ?> <?=$bid_word?><?= $lang['bids_quont']?></h1>

        <div class="text-center  my-4"><button type="button" class="btn btn-success  btn-lg btn-shadow" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i><?= $lang['make_a_bid']?></button></div>
        <div class="text-left mt-4">
            <h5 class="text-white"><?= $lang['timer_1']?></h5><h1 class="text-yellow"><span id="days_left"></span><?= $lang['timer_2']?><span id="timer"></span></h1>
        </div>
        <ul class="timeline">
            <?php foreach ($bids_history as $one_bid): ?>
                <li class="text-white mb-4">
                    <h1><?php
                        if (isset($_COOKIE["lang"]) and $_COOKIE["lang"] === 'en') {
                            echo number_format($one_bid[2] / $currency, 2, ',', ' ' );
                        }
                        else {
                            echo number_format($one_bid[2], 2, ',', ' ' );
                        };
                        ?> <?= $lang['currency']?></h1>
                    <p><?= $lang['history_1']?><?php $status=($one_bid[6] == 'on') ? $one_bid[1] : $lang['hide']; echo $status?><?= $lang['history_2']?><?=$one_bid[3] ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="row text-center mt-3">
        <a href="bidhistory.php"><button type="button" class="btn btn-warning btn-lg"><?= $lang['show_all']?></button></a>
    </div>
</div>

<div class="row newblock subіcribe d-flex align-items-center justify-content-center">
    <div class="col-sm-9 my-4 ">
        <h3 class="text-white text-center "><?= $lang['telegram']?></h3>
    </div>
    <div class="col-sm-3 my-4 text-center">
        <a href="https://t.me/all4ukraineua"><button type="button" class="btn btn btn-primary btn-shadow btn-lg" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-brands fa-telegram fa-xl"></i><?= $lang['subscribe']?></button></a>
    </div>
</div>

<div class="row  d-flex align-items-center justify-content-center my-4" id="Forwhat">
    <div class="col-sm">
        <img src="img/car.png" class="rounded mx-auto d-block img-fluid my-4" alt="...">
    </div>
    <div class="col-sm text-white">
        <h4 class="my-4"><?= $lang['for_what_1']?></h4>
        <p><?= $lang['for_what_2']?></p>
    </div>
</div>

<!-- make a new bid (modal window) -->

<div class="modal fade " id="create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-hand-holding-dollar"></i><?= $lang['add_bill_new']?> <?=number_format($max_bid, 2, ',', ' ' )?> <?= $lang['currency']?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body">
                <form action="models/add.php" method="post" >
                    <input type="hidden" class="form-control" name="page_from" value="index"> <!-- for send page -->
                    <div class="form-floating mt-2">
                        <input type="number" min="<?= sprintf('%0.2f', $max_bid) + 0.01 ?>" class="form-control" id="floatingBid" name="bid" required placeholder="example"  step="0.01">
                        <label for="floatingBid"><?= $lang['add_bill_amount']?></label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control" id="floatingName" name="name" required placeholder="example" value="<?php if (isset($_COOKIE["name"])) echo $_COOKIE["name"];?>">
                        <label for="floatingName"><?= $lang['add_bill_name']?></label>
                    </div>
                    <div class="form-floating mt-2 mb-4">
                        <input type="checkbox" id="show_my_name" name="show_my_name" checked="checked"><small><?= $lang['add_bill_showname']?></small>
                    </div>
                    <hr>
                    <h5 class="modal-title"><i class="fa-solid fa-id-card"></i><?= $lang['add_bill_contact_1']?></h5>
                    <small><?= $lang['add_bill_contact_2']?></small>
                    <div class="form-floating mt-2">
                        <input type="email" class="form-control" id="floatingEmail" name="email" required placeholder="example" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"];?>">
                        <label for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="tel" class="form-control" id="floatingPhone" name="phone" required placeholder="example" value="<?php if (isset($_COOKIE["phone"])) echo $_COOKIE["phone"];?>">
                        <label for="floatingPhone"><?= $lang['add_bill_phone']?></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $lang['add_bill_close']?></button>
                        <button type="submit" class="btn btn-primary" name="add"><?= $lang['make_a_bid']?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="js/timer.js"></script>
<script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="js/post_info.js"></script>
<?php include 'footer.php' ?>
