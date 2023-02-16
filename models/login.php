<?php

require_once '../config/connect.php';

$user = $_POST['user'];
$password = $_POST['password'];

$systemUser = mysqli_query($connect,"SELECT value FROM `params` WHERE param='login'");
$systemUser = mysqli_fetch_array($systemUser);

$systemPass = mysqli_query($connect,"SELECT value FROM `params` WHERE param='pass'");
$systemPass = mysqli_fetch_array($systemPass);

if ($user == $systemUser['value'] and $password == $systemPass['value']) {
    setcookie("login", $user, time() + 14 * 86400, "/");
    setcookie("password", $password, time() + 14 * 86400, "/");
    header('Location: ../bidlist.php');
}
else {
    header('Location: ../login.php');
}
?>