<?php
$title = "Page de contact";
require 'page.php/config.php';
require __DIR__ . "/page.php/header.php"; 
$creneaux = creneaux_html_2(HORAIRES);
?>
<div class="row" style="height: 500px;">
    <div class="col-md-6" style="position: absolute; left: 0px">
        <h1>Horaires d'ouvertures</h1>
        <ul style="list-style: none;">
            <?php echo $creneaux?>
        </ul>
    </div>
    <div class="col-md-6" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin: 0 auto;">
        <img src="page.php/img/logo-jampi.png" alt="Jampi, artisan glacier" style="height: 144px; width: 180px;">
        <h1>Nous contacter</h1>
        <p>Adresse :<br>
            Kerguillo<br>
            29820 Bohars, Brest<br><br>

            Tél. boutique : 02 98 03 56 12<br><br>

            Tél. standard : 02 98 03 56 12
        </p>
    </div>
    <div class="col-md-2" style="position: absolute; right: 0px;">
        <ul class = "list-unstyled">
            <h5>Heure actuel:<br> <?= date('H:i')?></h5>
        </ul>
    </div>
</div>


</html>
<?php require  __DIR__ . "/page.php/footer.php"; ?>
 