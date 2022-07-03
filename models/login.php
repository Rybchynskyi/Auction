<?php
$user = $_POST['user'];
$password = $_POST['password'];

if ($user == "All4Ukraine" and $password == "qwerty") {
    header('Location: ../bidlist.php');
    setcookie("login", $user, time() + 14 * 86400, "/");
    setcookie("password", $password, time() + 14 * 86400, "/");
}
else {
    header('Location: ../login.php');
}
?>