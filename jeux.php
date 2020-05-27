
<?php $aDeviner = 71?>
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

<form action="/jeux.php" method = "GET">
<input type="number" name="chiffre" placeholder="nombre entre 1 et 100" value = "<?php echo $value?>" >
<button type="submit">Valider</button>
</form> 

<?php require  __DIR__ . "/page.php/footer.php"; ?>
