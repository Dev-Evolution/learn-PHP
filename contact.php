<?php
$title = "Page de contact";
require 'page.php/config.php';
require __DIR__ . "/page.php/header.php"; 
$creneaux = creneaux_html_2(HORAIRES);
?>
<div class="row" style="height: 500px; display: flex;">
        <!-- rendez-vous JS -->
    <div style="position: absolute; left: 0; height: 300px; margin: 200px 0 0 50px;">
        <h5 style="margin-bottom: 20px; white-space: nowrap;">Prendre un rendez-vous:</h5>
        <label for="selectJourJS">Jour du rendez-vous:</label>
        <select  name="selectJourJS" id="selectJourJS" onchange="creneauxSelector(this.value)">
            <option value="Jour"> Jour </option>
        </select>
        <div class="choiceCreneauJS" style="visibility: hidden; white-space: nowrap;">
            <label for="selectCreneauJS">Creneau du rendez-vous:</label>
            <select  name="selectCreneauJS" id="selectCreneauJS" onchange="valideCreneaux(this.value)">
                <option value="Creneau"> Creneau </option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary valideCreneaux" style="visibility: hidden;">Valider rendez-vous</button>
    </div>
    <div id="GoogleMap" style="position: absolute; height: 300px; width: 300px;">API KEY: AIzaSyD_2wc0twhFXOH0oBMdLwReOldgAfPiCkU</div>
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
 