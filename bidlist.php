<?php include 'header.php' ?>

<?php
// DB connect
require_once 'config/connect.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Зроблені ставки</h1>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Ім`я</th>
                    <th>Ставка</th>
                    <th>Час ставки</th>
                    <th>Контакти</th>
                    <th>Дії</th>
                </tr>

                <!-- list of bids-->
                <?php
                $bids_list = mysqli_query($connect,"SELECT * FROM `bid_list` ORDER BY bid DESC");
                $bids_list = mysqli_fetch_all($bids_list);
                foreach ($bids_list as $bids_item): ?>

                    <tr>
                        <td><?= $bids_item[0] ?></td>
                        <td><?= $bids_item[1] ?></td>
                        <td><?= $bids_item[2] ?></td>
                        <td><?= $bids_item[3] ?></td>
                        <td><?= $bids_item[4] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $bids_item[0] ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="models/delete.php?id=<?= $bids_item[0] ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#create"><i class="fa-solid fa-circle-up" data-toggle="modal" data-target="#create"></i>  Підняти ставку</button>
        </div>
    </div>
</div>

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
                        <button type="submit" class="btn btn-primary" name="add">Підвищити ставку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
