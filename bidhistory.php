<?php
    date_default_timezone_set('Europe/Kiev'); // set timezone by default
    include 'header.php';
    include 'menu.php';

    // DB connect
    require_once 'config/connect.php';

    $bids_history = mysqli_query($connect, "SELECT * FROM bid_list ORDER BY bid_id DESC");
    $bids_history = mysqli_fetch_all($bids_history);
?>

<div class="container mt-5 mb-5">
    <div class="row text-white">
        <h1>Історія ставок станом на <?=date("d.m, g:i a");?></h1>
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
</div>
<?php
    include 'footer.php';
?>
