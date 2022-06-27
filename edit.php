<?php include 'header.php' ?>

<?php
    require_once 'config/connect.php';
    $bid_id = $_GET['id'];
    $updated_data = mysqli_query($connect, "SELECT * FROM `bid_list` WHERE bid_id = '$bid_id'");
    $updated_data = mysqli_fetch_array($updated_data);
?>

<div class="container">
    <div class="row">
        <div class="col_sm">
            <form action="models/update.php" method="post" >
                <input type="hidden" class="form-control" name="bid_id" value="<?=$updated_data[0]?>"> <!-- for send ID by using POST into models/update.php -->
                <div class="form-group">
                    <small>Ім`я</small>
                    <input type="text" class="form-control" name="name" value="<?=$updated_data[1]?>">
                </div>
                <div class="form-group">
                    <small>Ставка</small>
                    <input type="text" class="form-control" name="bid" value="<?=$updated_data[2]?>">
                </div>
                <div class="form-group">
                    <small>Email</small>
                    <input type="text" class="form-control" name="email" value="<?=$updated_data[4]?>">
                </div>
                <div class="form-group">
                    <small>Дата і час ставки</small>
                    <input type="text" class="form-control" name="time" value="<?=$updated_data[3]?>">
                </div>
                    <button type="submit" class="btn btn-primary mt-4" name="add">Відредагувати ставку</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>
