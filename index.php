<?php
// DB connect
require_once 'config/connect.php';

$max_bid = mysqli_query($connect, "SELECT MAX(Bid) FROM bid_list");
$max_bid = mysqli_fetch_array($max_bid);
$num_bids = mysqli_query($connect, "SELECT COUNT(*) FROM bid_list");
$num_bids = mysqli_fetch_array($num_bids);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Аукцион All4Ukraine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="css/cover.css" rel="stylesheet">

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>


<!-- Custom styles for this template -->

</head>

<body class="d-flex h-100 text-center bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto text-white">
        <div>
            <h3 class="float-md-start mb-0 shadow">Cover</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end ">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Contact</a>
            </nav>
        </div>
    </header>

    <main class="px-3">
        <h1 class="text-white my-4">Розігруємо славнозвісну марку з підписом автора</h1><br>
        <h1 class="text-white my-4">Максимальна ставка: <? echo $max_bid["MAX(Bid)"]?></h1>
        <h1 class="text-white my-4">Ставок: <? echo $num_bids["COUNT(*)"]?></h1>
        <p class="lead text-white">Прийміть участь у аукціоні і отримайте марку з підписом автора славнозвісної фрази. Всі отримані кошти підуть на покупку реанімобіля для медичної служби військової частини А7030. </p>
        <p class="lead">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i>  Підняти ставку</button>
        </p>
    </main>


<!-- make a new bid (modal window) -->

    <div class="modal fade modal-dialog modal-dialog-centered" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Підвищити ставку</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
                </div>
                <div class="modal-body">
                    <form action="models/add.php" method="post" >
                        <div class="form-group">
                            <small>Ставка</small>
                            <input type="text" class="form-control" name="bid">
                        </div>
                        <div class="form-group">
                            <small>Ім`я</small>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <small>Email</small>
                            <input type="text" class="form-control" name="email">
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



</div>

<?php include 'footer.php' ?>
