<?php

    // DB connect
    require_once 'config/connect.php';

    // SQL Query`s
    $max_bid = mysqli_query($connect, "SELECT MAX(Bid) FROM bid_list");
    $max_bid = mysqli_fetch_array($max_bid);

    $num_bids = mysqli_query($connect, "SELECT COUNT(*) FROM bid_list");
    $num_bids = mysqli_fetch_array($num_bids);

    $bids_history = mysqli_query($connect, "SELECT * FROM bid_list ORDER BY bid_id DESC LIMIT 7");
    $bids_history = mysqli_fetch_all($bids_history);

    // add header
    include 'header.php';

    //add container
    echo '<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">';

    //add menu and active page
    include 'menu.php';

    // language selector
    require "models/language_list.php";
    $lang = "$" . $_COOKIE["lang"];
    $lang = $_COOKIE["lang"] === 'en' ? $en : $ua;

    // bid or bidS
    $var = $num_bids["COUNT(*)"];
    $bid_word = ($var > 4) ? $lang['bids'] : $lang['bid'];

?>

    <?php require_once 'menu.php'; ?>
    <div class="row d-flex align-items-center justify-content-center my-4">
        <div class="col-sm-7 first-part">
            <div class="px-3">
                <h1 class="text-white mt-4"><?= $lang['site_title_1']?></h1><br>
                <h5 class="lead text-white pb-4"><?= $lang['site_title_2']?></h5>
                <h3 class="text-white my-4"><?= $lang['max_bid']?><? echo number_format( $max_bid["MAX(Bid)"], 0, ',', ' ' ); ?> <?= $lang['currency']?></h3>
                <p class="lead">
                    <button type="button" class="btn btn-success btn-shadow  my-4" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i><?= $lang['make_a_bid']?></button>
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
            <h5 class="text-center text-white"><?= $lang['timer_1']?></h5><h1 class="text-center text-yellow"><span id="days_left"></span><?= $lang['timer_2']?><span id="timer"></span></h1>

            <div class="text-center  my-4"><button type="button" class="btn btn-success btn-shadow" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i><?= $lang['make_a_bid']?></button></div>
            <ul class="timeline">
                <?php foreach ($bids_history as $one_bid): ?>
                <li class="text-white mb-4">
                    <h1><?=$one_bid[2] ?> <?= $lang['currency']?></h1>
                    <p><?= $lang['history_1']?><?php $status=($one_bid[6] == 'on') ? $one_bid[1] : $lang['hide']; echo $status?><?= $lang['history_2']?><?=$one_bid[3] ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="row text-center mt-3">
            <a href="bidhistory.php"><button type="button" class="btn btn-warning"><?= $lang['show_all']?></button></a>
        </div>
    </div>

    <div class="row  d-flex align-items-center justify-content-center my-4">
        <div class="col-sm">
            <img src="img/car.png" class="rounded mx-auto d-block img-fluid my-4" alt="...">
        </div>
        <div class="col-sm">
            <h3 class="text-white my-4"><?= $lang['for_what_1']?></h3>
            <h5 class="text-white"><?= $lang['for_what_2']?></h5>
        </div>
    </div>

    <!-- make a new bid (modal window) -->

    <div class="modal fade " id="create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-hand-holding-dollar"></i>   Перебити ставку <?=$max_bid["MAX(Bid)"]?> грн.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
                </div>
                <div class="modal-body">
                    <form action="models/add.php" method="post" >
                        <input type="hidden" class="form-control" name="page_from" value="index"> <!-- for send page -->
                        <div class="form-floating mt-2">
                            <input type="number" min="<?=$max_bid["MAX(Bid)"] +1?>" class="form-control" id="floatingBid" name="bid" required placeholder="example">
                            <label for="floatingBid">Ставка (ціле число в гривні)</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" class="form-control" id="floatingName" name="name" required placeholder="example" value="<?php if (isset($_COOKIE["name"])) echo $_COOKIE["name"];?>">
                            <label for="floatingName">Ім`я</label>
                        </div>
                        <div class="form-floating mt-2 mb-4">
                            <input type="checkbox" id="show_my_name" name="show_my_name" checked="checked"><small>   Показувати моє ім`я іншим учасникам</small>
                        </div>
                        <hr>
                        <h5 class="modal-title"><i class="fa-solid fa-id-card"></i>   Контактні дані</h5>
                        <small>Для зв`язку з Вами якщо Ви виграєте аукціон</small>
                        <div class="form-floating mt-2">
                            <input type="email" class="form-control" id="floatingEmail" name="email" required placeholder="example" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"];?>">
                            <label for="floatingEmail">Email</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="tel" class="form-control" id="floatingPhone" name="phone" required placeholder="example" value="<?php if (isset($_COOKIE["phone"])) echo $_COOKIE["phone"];?>">
                            <label for="floatingPhone">Телефон:</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                            <button type="submit" class="btn btn-primary" name="add">Підняти ставку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







<script src="js/timer.js"></script>
<?php include 'footer.php' ?>
