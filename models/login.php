<?php
$user = $_POST['user'];
$password = $_POST['password'];

if ($user == "All4Ukraine" and $password == "qwerty") {
    header('Location: ../bidlist.php');
}
else {
    header('Location: ../login.php');
}
?>