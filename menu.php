<?php
    function show_menu($active) {
        if ($active == "Історія") {
            return $history = "active";
        }
        elseif ($active == "Запропонувати") {
            return $prep = "active";
        }
    }
?>

<header class="mb-auto text-white">

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="index.php">BidForUkraїne</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "conditions") echo "active"?>" href="conditions.php">Умови участі</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "history") echo "active"?>" href="bidhistory.php">Історія ставок</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "suggest") echo "active"?>" href="suggest.php">Заропонувати лот</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "contacts") echo "active"?>" href="contacts.php">Контакти</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Мова, валюта
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="models/lang.php?lang=ua">UA,₴</a></li>
                        <li><a class="dropdown-item" href="models/lang.php?lang=en">EN,$</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>