<?php
    date_default_timezone_set('Europe/Kiev'); // set timezone by default
    include 'header.php';

    // DB connect
    require_once 'config/connect.php';

    $bids_history = mysqli_query($connect, "SELECT * FROM bid_list ORDER BY bid_id DESC");
    $bids_history = mysqli_fetch_all($bids_history);

    // SQL MAX-BID for ua/en
    $max_bid = mysqli_query($connect, "SELECT MAX(Bid) FROM bid_list");
    $max_bid = mysqli_fetch_array($max_bid);
    $max_bid = $max_bid["MAX(Bid)"];

    if (isset($_COOKIE["lang"]) and $_COOKIE["lang"] === 'en') {
        $max_bid = $max_bid / $currency;
    }
    else {
        $max_bid = $max_bid;
    }

    // language selector
    require "models/language_list.php";
    $lang = "$" . $_COOKIE["lang"];
    $lang = $_COOKIE["lang"] === 'en' ? $en : $ua;
?>

<?php
    $menuitem = "history";
    include 'menu.php';
?>
<div class="mt-5 mb-5">
    <div class="row text-white text-center">
        <h2>Історія ставок станом на <?=date("d.m, g:i a");?></h2>
    </div>
    <div class="row text-center mt-3">
        <button type="button" class="btn btn-success btn-shadow" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i>  Підняти ставку</button>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4>Latest News</h4>
            <ul class="timeline">
                <?php foreach ($bids_history as $one_bid): ?>
                <li class="text-white mb-4">
                    <h1><?=$one_bid[2] ?> грн.</h1>
                    <p>Добродій <?php $status=($one_bid[6] == 'on') ? $one_bid[1] : "(прихований)"; echo $status?> підвищив ставку станом на: <?=$one_bid[3] ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
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

</div>
<?php
    include 'footer.php';
?>
