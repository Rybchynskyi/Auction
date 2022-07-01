<?php
    // add header
    include 'header.php';

    //add container
    echo '<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">';

    //add menu and active page
    $menuitem = "conditions";
    include 'menu.php';
?>

<div class="row">
    <div class="col-sm text-white mt-4">
        <h2>
            Умови участі
        </h2>
        <p\">
            Виберіть розділ що вас цікавить або зв'яжіться з нами при необхідності
        </p>

    </div>
</div>
<div class="row">
    <div class="col-sm">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Умови участі в аукціоні
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                Для прийняття участі в аукціоні потрібно зробити ставку та залишити контактні дані
                            </li>
                            <li>
                                Аукціон триває до моменту його закінчення сгідно таймеру на головній сторінці. Всі ставки що були надані після закінчення аукціону - не будуть прийматись
                            </li>
                            <li>
                                Переможцем благодійного аукціону вважається той, хто зробив найбільшу ставку. Якщо волонтерський фонд не зможе звязатись з переможцем аукціону на протязі дня - переможцем вважається наступний кандидат згідно списку
                            </li><li>
                                Відправка лоту  відбувається за рахунок переможця і вибраним переможцем способом. Адже всі отримані за аукціон кошти підуть на закриття потреб ЗСУ
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Про волонтерський фонд
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Волонтерський фонд був організований підприємцем <strong><a href="https://www.facebook.com/profile.php?id=100001783389284">Савченко Сергієм Олексієвичем</a></strong> на початку повномасштабного вторгнення росії на територію України.</p>
                        <p>Інформацію про волонтерський фонд та команду фонду ви можете отримати <a href="https://www.facebook.com/all4ukraineua">на сайті фонду</a> та на нашій <a href="https://www.all4ukraine.org/">фейсбук сторінці</a>.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Хто може бачити мої контактні дані
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Доступ до контактних даних є лише у представників волонтерської організації.</p>
                        <p>Для участників аукціону доступ відкритий лише до імені участниців.</p>
                        <p>При бажанні - ви можете приховати власне ім`я при піднятті ставки</p>
                        <p>Контактні дані потрібні для підтвердження наміру виграти аукціон та для звязку з переможцем.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

// add footer
<?php include 'footer.php' ?>
