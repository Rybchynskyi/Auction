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
    <div>
        <a class="text-white" href="index.php"><h3 class="float-md-start mb-0 shadow">BidForUkraїne</h3></a>
        <nav class="nav nav-masthead justify-content-center float-md-end ">
            <a class="nav-link <?php if($menuitem == "conditions") echo "active"?>" href="conditions.php">Умови участі</a>
            <a class="nav-link <?php if($menuitem == "history") echo "active"?>" href="bidhistory.php">Історія ставок</a>
            <a class="nav-link <?php if($menuitem == "suggest") echo "active"?>" href="suggest.php">Заропонувати лот</a>
            <a class="nav-link <?php if($menuitem == "contacts") echo "active"?>" href="contacts.php">Контакти</a>
            <a class="nav-link text-yellow" href="bidlist.php">   ││ Адмінпанель</a>
            <a href="models/lang.php?lang=ua"><button type="button" class="btn btn-secondary ms-4 btn-sm">Ua,₴</button></a>
            <a href="models/lang.php?lang=en"><button type="button" class="btn btn-secondary ms-2 btn-sm">En,$</button></a>
        </nav>

    </div>
</header>