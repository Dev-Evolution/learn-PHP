
<?php
$parfums = [
    "vanille" => 1.5,
    "chocolat" => 1.5,
    "fraise" => 1.5,
    "passion" => 1.5,
    "caramel beurre salé" => 2
];

$contenants = [
    "pot" => 0.5,
    "cornet" => 1,
    "crêpe" => 1
];

$supplements = [
    "chocolat" => 1.5,
    "chantilly" => 1,
    "fruit frais" => 2
];

$somme = 0;

require "page.php/header.php";
?>

<h1>Composer votre glace</h1>
<div style="float: left; margin-bottom: 20px;">
    <form action="/validePrixGlace.php" method = "GET" >
        <h5>Choisisser un ou plusieurs parfums</h5>
        <?php foreach($parfums as $parfum => $prix):?>
            <div class="checkbox">
                <label> 
                    <?= listeChoix('parfums', $parfum, $prix)?>
                    <?= $parfum?> - <?= $prix?> €
                </label>
            </div>
        <?php endforeach?> 
        <h5>Choisisser un contenant</h5>
        <?php foreach($contenants as $contenant => $prix):?>
            <div class="checkbox">
                <label>
                    <?= listeChoix('contenants', $contenant, $prix)?>
                    <?= $contenant?> - <?= $prix?> €
                </label>
            </div>
        <?php endforeach?> 
        <h5>Choisisser un ou plusieurs suppléments</h5>
        <?php foreach($supplements as $supplément => $prix):?>
            <div class="checkbox">
                <label>
                    <?= listeChoix('supplements', $supplément, $prix)?>
                    <?= $supplément?> - <?= $prix?> €
                </label>
            </div>
        <?php endforeach?> 
        <button type = "submit" class = "btn btn-primary">validé</button>
    </form> 
</div>

<div style ="display: flex; border: solid 2px red; width: 300px; height: auto; position: sticky; top: 20px; margin: 0 auto;">
    <div  style ="margin-left: 16px; padding: 16px 0">
        <?php echo resultats($parfums, $contenants, $supplements)?>
    </div>
</div>

<pre style="width: 100%; clear: both;">
    <?= var_dump($_GET)?>
</pre>

<?php require "page.php/footer.php"?>
