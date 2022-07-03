<?php
    $lang = $_GET["lang"];

    setcookie("lang", $lang, time() + 14 * 86400, "/");

    header('Location: ../index.php');
?>