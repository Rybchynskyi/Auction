<?php

// DB connect
require_once 'config/connect.php';

// SQL Querys
$max_bid = mysqli_query($connect, "SELECT MAX(Bid) FROM bid_list");
$max_bid = mysqli_fetch_array($max_bid);

$num_bids = mysqli_query($connect, "SELECT COUNT(*) FROM bid_list");
$num_bids = mysqli_fetch_array($num_bids);

$bids_history = mysqli_query($connect, "SELECT * FROM bid_list ORDER BY bid_id DESC");
$bids_history = mysqli_fetch_all($bids_history);

include 'header.php';
include 'menu.php';
?>

<div class="px-3">
    <h1 class="text-white my-4">Розігруємо славнозвісну марку з підписом автора</h1><br>
    <h1 class="text-white my-4">Максимальна ставка: <? echo $max_bid["MAX(Bid)"]?> грн.</h1>
    <h1 class="text-white my-4">Ставок: <? echo $num_bids["COUNT(*)"]?></h1>
    <p class="lead text-white">Прийміть участь у аукціоні і отримайте марку з підписом автора славнозвісної фрази. Всі отримані кошти підуть на покупку реанімобіля для медичної служби військової частини А7030. </p>
    <p class="lead">
        <button type="button" class="btn btn-success btn-shadow" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i>  Підняти ставку</button>
    </p>
</div>


<div class="container mt-5 mb-5">
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


<!-- make a new bid (modal window) -->

<div class="modal fade " id="create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title"><i class="fa-solid fa-hand-holding-dollar"></i>   Підняти ставку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body">
                <form action="models/add.php" method="post" >
                    <input type="hidden" class="form-control" name="page_from" value="index"> <!-- for send page -->
                    <div class="form-group mt-2">
                        <small>Ставка (ціле число в гривні)</small>
                        <input type="text" class="form-control" name="bid">
                    </div>
                    <div class="form-group mt-2">
                        <small>Ім`я</small>
                        <input type="text" class="form-control" name="name" value="<?php $cookie_name=($_COOKIE["name"] == NULL) ? "" : $_COOKIE["name"]; echo $cookie_name; ?>">
                    </div>
                    <div class="form-group mt-2 mb-4">
                        <input type="checkbox" id="show_my_name" name="show_my_name" checked="checked"><small>   Показувати моє ім`я в історії платежів</small>
                    </div>
                    <hr>
                    <h5 class="modal-title"><i class="fa-solid fa-id-card"></i>   Контактні дані</h5>
                    <small>Вони нам потрібні щоб ми могли зв`язатися з Вами якщо Ви виграєте аукціон</small>
                    <div class="form-group mt-2">
                        <small>Email</small>
                        <input type="text" class="form-control" name="email" value="<?php $cookie_email=($_COOKIE["email"] == NULL) ? "" : $_COOKIE["email"]; echo $cookie_email; ?>">
                    </div>
                    <div class="form-group mt-2">
                        <small>Телефон:</small>
                        <input type="text" class="form-control" name="phone" value="<?php $cookie_phone=($_COOKIE["phone"] == NULL) ? "" : $_COOKIE["phone"]; echo $cookie_phone; ?>">
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








<?php include 'footer.php' ?>
