
<?php 
require_once 'page.php/config.php';
$heure = (int)date('H');
$creneauxNow = HORAIRES[date('N') - 1];
$ouvert = in_creneaux($heure, $creneauxNow);
$colorJour = $ouvert ? '#3CD576' : 'red';
?>
</main><!-- /.container -->
<footer>
    <div class = "row" style="display: flex; justify-content:center; margin-top: 50px;">
        <div class = "col-md-4" style="text-align: center;">
            <h5 style="margin-bottom: 20px;">Prendre un rendez-vous</h5>
                <label for="selectJour">Jour du rendez-vous:</label>
                <select name="selectJour" id="selectJour">
                    <option value=""> Jour </option>
                    <?php foreach(JOURS as $k => $jour):?>
                        <?php if(creneaux_html(HORAIRES[$k]) != 'fermé'):?>
                            <option value="<?= $jour?>" index="<?= $k?>"> <?= '<strong>' . $jour . '</strong>'?> </option>
                        <?php endif?>
                    <?php endforeach?>
                </select>
                <br>
                <div class="choiceCreneau" style="visibility: hidden;">
                    <label for="selectCreneau">Creneau du rendez-vous:</label>
                    <select name="selectCreneau" id="creneauSelect">
                        <option value=""> Creneau </option>
                        <?php foreach(JOURS as $k => $jour):?>
                            <?php if(creneaux_html(HORAIRES[$k]) != 'fermé'):?>
                                <option value="<?= 'creneaux' . $jour?>"> <?= creneaux_html(HORAIRES[$k])?> </option>
                            <?php endif?>
                        <?php endforeach?>
                    </select>
                </div>
        </div>
        <div style="width: 400px;">
            <div style="width: 393.656px">
                <h5 style="text-align: center;">Horaire d'ouvertures</h5>
                <?php if($ouvert):?>
                    <div class="alert alert-success" style="text-align: center;">
                        le magasin est ouvert
                    </div>
                <?php else:?>
                    <div class="alert alert-danger" style="text-align: center;">
                        le magasin est fermé
                    </div>
                <?php endif; ?>
            </div>
            <ul style="list-style-type: circle;">
                <?php foreach(JOURS as $k => $jour):?>
                    <li <?php if((int)date('N') === $k + 1){ echo'style="color:' . $colorJour . ';"' ;}?>>
                        <?= $jour . ' : ' . creneaux_html(HORAIRES[$k]);?>
                    </li>
                <?php endforeach?>
            </ul>
        </div>
        <div class = "col-md-4" style="display: flex; flex-direction: column;">
            <div style="margin: 0 auto;">
                <h5 >Navigation</h5>
                <ul class = "list-unstyled">
                    <li><?= navlink()?></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE5+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="page.php/footer.js" type="text/javascript"></script>
</body>
</html>