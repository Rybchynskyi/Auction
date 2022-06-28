<?php

    include 'header.php';
    include 'menu.php';

    require_once 'config/connect.php';
    $bid_id = $_GET['id'];
    $updated_data = mysqli_query($connect, "SELECT * FROM `bid_list` WHERE bid_id = '$bid_id'");
    $updated_data = mysqli_fetch_array($updated_data);
?>
<h1 class="text-white mt-4">Редагування ставки <?=$updated_data[1]?></h1>
<div class="container">
    <div class="row">
        <div class="col_sm-6">
            <form action="models/update.php" method="post" >
                <input type="hidden" class="form-control" name="bid_id" value="<?=$updated_data[0]?>"> <!-- for send ID by using POST into models/update.php -->
                <input type="hidden" class="form-control" name="page_from" value="bidlist"> <!-- for send page -->
                <div class="form-group">
                    <h4 class="text-white">Ім`я:</h4>
                    <input type="text" class="form-control" name="name" value="<?=$updated_data[1]?>">
                </div>
                <div class="form-group mt-2 mb-4 text-white">
                    <input type="checkbox" id="show_my_name" name="show_my_name" checked="checked"><small>   Показувати ім`я в історії платежів?</small>
                </div>
                <div class="form-group mt-3">
                    <h4 class="text-white">Ставка:</h4>
                    <input type="text" class="form-control" name="bid" value="<?=$updated_data[2]?>">
                </div>
                <div class="form-group mt-3">
                    <h4 class="text-white">Email:</h4>
                    <input type="text" class="form-control" name="email" value="<?=$updated_data[4]?>">
                </div>
                <div class="form-group mt-3">
                    <h4 class="text-white">Телефон:</h4>
                    <input type="text" class="form-control" name="phone" value="<?=$updated_data[4]?>">
                </div>
                <div class="form-group mt-3">
                    <h4 class="text-white">Дата і час ставки</h4>
                    <small class="text-white">Обов`язково в такому ж форматі</small>
                    <input type="text" class="form-control" name="time" value="<?=$updated_data[3]?>">
                </div>
                    <button type="submit" class="btn btn-primary mt-4" name="add">Відредагувати ставку</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
