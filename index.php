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

// SQL define quantity of bids
$num_bids = mysqli_query($connect, "SELECT COUNT(*) FROM bid_list");
$num_bids = mysqli_fetch_array($num_bids);

// SQL define bids history
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
        <div class="col-md-7 align-self-center">
            <div class="px-3">
                <div class="glass_effect px-4 py-3 mb-3">
                    <h2 class="text-white"><?= $lang['site_title_1']?></h2>
<!--                    <small class="text-white">--><?//= $lang['site_title_2']?><!--</small>-->
                    <h6 class="my-5 text-white"><?= $lang['site_title_3']?> <a class="link" href="#Forwhat"><u><?= $lang['site_title_4']?></u></a></h6>
                    <h3 id="bids_quant" class="text-white d-none"><?= $lang['max_bid']?><?= number_format($max_bid, 0, '', ' ' ) . " " . $lang['currency']?></h3>
                    <p class="lead">
                        <button type="button" id='bid-btn-1' class="btn btn-success btn-shadow btn-lg mt-4 d-none" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i><?= $lang['make_a_bid']?></button>
                    </p>
                </div>


            </div>
        </div>
        <div class="col-md-5 align-self-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
<!--                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>-->
<!--                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
<!--                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active pe-3" data-bs-interval="7000">
                        <img class="d-block img-fluid img_shadow_right" src="img/2_emp.png" alt="...">
                    </div>
<!--                    <div class="carousel-item pe-3" data-bs-interval="7000">-->
<!--                        <img class="d-block img-fluid img_shadow_right" src="img/photo_2023-01-26 15.24.35.jpeg" alt="...">-->
<!--                    </div>-->
<!--                                    <div class="carousel-item align-self-center" data-bs-interval="7000">-->
<!--                                        <video class="video"  autoplay muted loop >-->
<!--                                            <source type="video/mp4" src="img/IMG_3461.MOV">-->
<!--                                        </video>-->
<!--                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/a1a9CX3mips" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--                                    </div>-->
<!--                                    <div class="carousel-item" data-bs-interval="7000">-->
<!--                                        <img class="d-block img-fluid img_shadow_right " src="img/photo_2023-01-26 15.24.40.jpeg" alt="...">-->
<!--                                    </div>-->
                </div>
                <!--            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">-->
                <!--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                <!--                <span class="visually-hidden">Предыдущий</span>-->
                <!--            </button>-->
                <!--            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">-->
                <!--                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                <!--                <span class="visually-hidden">Следующий</span>-->
                <!--            </button>-->
            </div>
        </div>
    </div>

    <div class="row d-flex p-3 mx-auto flex-column ">
        <div class="col-md-6 offset-md-3">
            <h1 id="text_before" class="text-center text-white my-4"><?= $lang['timerStart_1']?></h1>
            <h1 id="text_after" class="text-center text-white my-4 d-none"><?= $num_bids["COUNT(*)"]; ?> <?=$bid_word?><?= $lang['bids_quont']?></h1>
            <div class="text-center  my-4">
                <button type="button" id='bid-btn-2' class="btn btn-success btn-lg btn-shadow d-none" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i><?= $lang['make_a_bid']?></button></div>
            <div class="text-left mt-4">
                <h5 id="timer_start" class="text-white d-none"><?= $lang['timer_1']?></h5>
                <h1 id="bid-content" class="text-yellow">
                    <span id="days_left"></span><?= $lang['timer_2']?>
                    <span id="timer"></span>
                </h1>
                <h1 id="timer_end" class="timer_end text-yellow"><?= $lang['timer_end']?></h1>
            </div>
            <ul class="timeline">
                <?php foreach ($bids_history as $one_bid): ?>
                    <li class="text-white mb-4">
                        <h1><?php
                            if (isset($_COOKIE["lang"]) and $_COOKIE["lang"] === 'en') {
                                echo number_format($one_bid[2] / $currency, 0, '', ' ' );
                            }
                            else {
                                echo number_format($one_bid[2], 0, '', ' ' );
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

    <div class="row my-5 py-4 glass_effect d-flex align-items-center justify-content-center">
        <div class="col-sm-9">
            <h3 class="text-white text-center "><?= $lang['telegram']?></h3>
        </div>
        <div class="col-sm-3 text-center">
            <a href="https://t.me/all4ukraineua"><button type="button" class="btn btn btn-primary btn-shadow btn-lg" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-brands fa-telegram fa-xl"></i><?= $lang['subscribe']?></button></a>
        </div>
    </div>

    <div class="row  d-flex align-items-center justify-content-center my-4" id="Forwhat">
        <div class="col-sm-5">
            <img class="mx-auto d-block img-fluid my-4 img_shadow_left" src="img/photo_2023-02-11 21.10.57.jpeg" alt="...">
        </div>
        <div class="col-sm text-white ms-3">
            <h4 class="my-4"><?= $lang['for_what_1']?></h4>
            <p><?= $lang['for_what_2']?></p>
        </div>
    </div>

    <!-- make a new bid (modal window) -->

    <div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content glass_popup">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-hand-holding-dollar"></i><?= $lang['add_bill_new']?> <?=number_format($max_bid, 0, '', ' ' )?> <?= $lang['currency']?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
                </div>
                <div class="modal-body">
                    <form action="models/add.php" method="post" >
                        <input type="hidden" class="form-control" name="page_from" value="index"> <!-- for send page -->
                        <div class="form-floating mt-2">
                            <input type="number" min="<?= sprintf('%0.2f', $max_bid) + 1 ?>" class="form-control" id="floatingBid" name="bid" required placeholder="example"  step="1">
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

    <script src="js/timer14.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="js/post_info.js"></script>
<?php include 'footer.php' ?>