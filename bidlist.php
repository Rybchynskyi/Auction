<?php
// DB connect
require_once 'config/connect.php';
// header
include 'header.php';
include 'menu.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Зроблені ставки</h1>
            <table class="table text-white">
                <tr class="bg-white text-black">
                    <th>ID</th>
                    <th>Ім`я</th>
                    <th>Ставка</th>
                    <th>Час ставки</th>
                    <th>Контакти</th>
                    <th>Статус контакту</th>
                    <th>Дії</th>
                </tr>

                <!-- list of bids-->
                <?php
                $bids_list = mysqli_query($connect,"SELECT * FROM `bid_list` ORDER BY bid_id ASC");
                $bids_list = mysqli_fetch_all($bids_list);
                foreach ($bids_list as $bids_item): ?>

                    <tr>
                        <td><?= $bids_item[0] ?></td>
                        <td><?= $bids_item[1] ?></td>
                        <td><?= $bids_item[2] ?></td>
                        <td><?= $bids_item[3] ?></td>
                        <td><?= $bids_item[4] . ", " . $bids_item[5]?></td>
                        <td><?php $status=($bids_item[6] == 'on') ? "відкритий" : "прихований"; echo $status?></td>
                        <td>
                            <a href="edit.php?id=<?= $bids_item[0] ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="models/delete.php?id=<?= $bids_item[0] ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i>  Добавити ставку</button>
        </div>
    </div>
</div>

<!-- make a new bid (modal window) -->

<div class="modal fade " id="create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title">Добавити ставку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body">
                <form action="models/add.php" method="post" >
                    <input type="hidden" class="form-control" name="page_from" value="bidlist"> <!-- for send page -->
                    <div class="form-group mt-2">
                        <small>Ставка (ціле число в гривні)</small>
                        <input type="text" class="form-control" name="bid">
                    </div>
                    <div class="form-group mt-2">
                        <small>Ім`я</small>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group mt-2 mb-4">
                        <input type="checkbox" id="show_my_name" name="show_my_name" checked="checked"><small>   Показувати моє ім`я в історії платежів</small>
                    </div>
                    <hr>
                    <h5 class="modal-title"><i class="fa-solid fa-id-card"></i>   Контактні дані</h5>
                    <small>Вони нам потрібні щоб ми могли зв`язатися з Вами якщо Ви виграєте аукціон</small>
                    <div class="form-group mt-2">
                        <small>Email</small>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group mt-2">
                        <small>Телефон:</small>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                        <button type="submit" class="btn btn-primary" name="add">Добавити ставку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php' ?>
