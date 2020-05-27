
<?php $aDeviner = 7?>
<?php
$mauvaisNombre = null;
$succes = null;
$value = null;
if(isset($_GET["chiffre"])){
    if($_GET["chiffre"] < $aDeviner){
        $mauvaisNombre = "votre nombre est trop petit";
    }
        
     elseif($_GET["chiffre"] > $aDeviner){
        $mauvaisNombre = "votre nombre est trop grand";
     }
        
     else{
        $succes = "Bravo! vous avez deviner le nombre  $aDeviner";
     }
     $value = (int)$_GET["chiffre"];
}
?>
<?php require "page.php/header.php"?>

<?php if($mauvaisNombre):?>
    <div class = "alert alert-danger">
        <?= $mauvaisNombre?>
    </div>
   
<?php elseif($succes):?>
    <div class = "alert alert-success">
        <?= $succes?>
    </div>
<?php endif?>

<form action="/jeux.php" method = "GET" style="display: flex; height: 500px; align-items: center;">
<label for="chiffre">Veuillez entrer un nombre</label>
<input type="number" name="chiffre" style="margin-left: 10px;" placeholder="nombre entre 1 et 10" value = "<?php echo $value?>" >
<button type="submit" style="margin-left: 10px;">Valider</button>
</form> 

<?php require  __DIR__ . "/page.php/footer.php"; ?>
