<?php
    $lang = $_GET["lang"];

    setcookie("lang", $lang, time() + 14 * 86400, "/auction/auction");

    header('Location: ../contacts.php');
?>