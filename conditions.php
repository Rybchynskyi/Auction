<?php
    // add header
    include 'header.php';


    //add menu and active page
    $menuitem = "conditions";
    include 'menu.php';
?>

<div class="row">
    <div class="col-sm text-white mt-4">
        <h2>
            <?= $lang['cond_1']?>
        </h2>
        <p>
            <?= $lang['cond_2']?>
        </p>

    </div>
</div>
<div class="row">
    <div class="col-sm">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?= $lang['cond_top_1']?>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?= $lang['cond_bottom_1']?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <?= $lang['cond_top_2']?>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?= $lang['cond_bottom_2']?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <?= $lang['cond_top_3']?>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?= $lang['cond_bottom_3']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

// add footer
<?php include 'footer.php' ?>
