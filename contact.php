<?php
$title = "Page de contact";
require 'page.php/config.php';
require __DIR__ . "/page.php/header.php"; 
$creneaux = creneaux_html_2(CRENEAUX);
?>
<div class="row" style="height: 500px;">
    <div class="col-md-6" style="display: flex; flex-direction: column; justify-content: center;">
        <h1>Nous contacter</h1>
        <p>Ok, I am trying to create an email logger, that uses a PHP shell script. I have set up CPanel to pipe emails to my script. I am sure this is all configured properly. However I am having problems with the script, well any script for that matter when running it from the shell.</p>
    </div>
    <div class="col-md-2" style="position: absolute; right: 0px;">
        <ul class = "list-unstyled">
            <h5>Heure actuel:<br> <?= date('H:i')?></h5>
        </ul>
    </div>
</div>


</html>
<?php require  __DIR__ . "/page.php/footer.php"; ?>
 