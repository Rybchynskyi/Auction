<?php
// language and language selector
function get_user_lang () {
    return isset($_COOKIE["lang"]) ? $_COOKIE["lang"] :'ua';
}
require "models/language_list.php";
$lang = get_user_lang() === 'en' ? $en : $ua;
?>

<header class="mb-auto text-white">

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand textbrand" href="index.php">BidForUkraїne 🇺🇦</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "conditions") echo "active"?>" href="conditions.php"><?= $lang['menu_conditions']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "history") echo "active"?>" href="bidhistory.php"><?= $lang['menu_history']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "contacts") echo "active"?>" href="contacts.php"><?= $lang['menu_contacts']?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-earth-americas"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="models/lang.php?lang=ua">UA,грн.</a></li>
                        <li><a class="dropdown-item" href="models/lang.php?lang=en">EN,USD</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>