<?php
    // add header
    include 'header.php';

    //add menu and active page
    $menuitem = "contacts";
    include 'menu.php';
?>

<div class="row d-flex align-items-center justify-content-center my-4">
    <div class="col-sm-6 text-white block-center">
        <strong><?= $lang['contacts_1']?></strong><br>
        <?= $lang['contacts_2']?> <a href="https://www.all4ukraine.org/" class="text-white">all4ukraine.org</a><br>
        <?= $lang['contacts_3']?> <a href="tel:0979563613" class="text-white">+38 (097) 956 36 13</a><br>
        <?= $lang['contacts_4']?> <a href="https://www.facebook.com/all4ukraineua" class="text-white">fb.com/all4ukraineua</a><br>
        <?= $lang['contacts_5']?> <a href="https://www.instagram.com/all4ukraine_ua/" class="text-white">all4ukraine_ua</a><br>
        <?= $lang['contacts_6']?> <a href="https://www.youtube.com/channel/UC33UhCxyFSXd9KZgEoYwLUg" class="text-white">All4Ukraine</a><br>
        <?= $lang['contacts_7']?> <a href="https://www.tiktok.com/@all4ua.support" class="text-white">tiktok.com/@all4ua.support</a><br>

    </div>
    <div class="col-sm-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2543.0143533724045!2d30.679594715688182!3d50.403570098622914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c48cdb7cdf27%3A0xe46b8f738f133054!2z0KXQsNGA0YzQutC-0LLRgdC60L7QtSDRiC4sIDIwMS8yMDMsINCa0LjQtdCyLCAwMjAwMA!5e0!3m2!1sru!2sua!4v1656880848240!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
// add footer
<?php include 'footer.php' ?>
