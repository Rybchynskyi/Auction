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

include 'header.php';


$var = $num_bids["COUNT(*)"];
$bid_word = ($var > 4) ? "ставок" : "ставки";
?>

    <?php include 'menu.php'; ?>
    <div class="row d-flex align-items-center justify-content-center my-4">
        <div class="col-sm-7">
            <div class="px-3">
                <h1 class="text-white mt-4">Розігруємо славнозвісну марку з підписом автора</h1><br>
                <h5 class="lead text-white pb-4">Прийміть участь у благодійному аукціоні. Допоможіть ЗСУ і отримайте марку з підписом автора славнозвісної фрази. Всі отримані кошти підуть на покупку реанімобіля для медичної служби військової частини А7030. </h5>
                <h3 class="text-white my-4">Максимальна ставка:   <? echo number_format( $max_bid["MAX(Bid)"], 0, ',', ' ' ); ?> грн.</h3>
                <h3 class="text-white my-4">Благодійний аукціон закінчується через: <p id="timer"></p></h3>
                <p class="lead">
                    <button type="button" class="btn btn-success btn-shadow" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i>  Підняти ставку</button>
                </p>
            </div>
        </div>
        <div class="col-sm-5">
            <img src="img/warchip.png" class="rounded mx-auto d-block img-fluid my-4" alt="...">
        </div>
    </div>







    <div class="row">
        <div class="col-md-6 offset-md-3">
                <h1 class="text-center text-white my-4"><? echo $num_bids["COUNT(*)"]; ?> <?=$bid_word?> вже зроблено!</h1>
            <div class="text-center "><button type="button" class="btn btn-success btn-shadow" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i>  Підняти ставку</button></div>
            <ul class="timeline">
                <?php foreach ($bids_history as $one_bid): ?>
                <li class="text-white mb-4">
                    <h1><?=$one_bid[2] ?> грн.</h1>
                    <p>Добродій <?php $status=($one_bid[6] == 'on') ? $one_bid[1] : "(прихований)"; echo $status?> підвищив ставку станом на: <?=$one_bid[3] ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="row text-center mt-3">
            <a href="bidhistory.php"><button type="button" class="btn btn-warning">Переглянути всі ставки</button></a>
        </div>
    </div>

    <div class="row  d-flex align-items-center justify-content-center my-4">
        <div class="col-sm">
            <img src="img/car.png" class="rounded mx-auto d-block img-fluid my-4" alt="...">
        </div>
        <div class="col-sm">
            <h3 class="text-white my-4">Всі кошти від благодійного аукціону будуть переразовані на реаніиобіль для медичної служби військової частини А7030 🙏 ❤️.</h3>
            <h5 class="text-white">Щодня російська орда ранить та вбиває сотні наших співвітчизників.</h5>
            <h5 class="text-white">Медична служба рятує не лише військових, а і місцевих жителів.</h5>
            <h5 class="text-white">Своєчасна евакуація з поля бою та надання першої медичної допомоги рятує життя.</h5>
            <h5 class="text-white">Медики – це ангели охоронці наших хлопців на полі бою.</h5>
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
