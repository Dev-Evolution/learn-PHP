
<?php require "page.php/header.php"?>


<form action="/glace.php" method = "GET">
        <div class = "form-group">
            <h6>Choisisser un ou plusieurs parfum</h6>        <!-- les [] après parfum permetent de créer un tableau afin de pouvoir y ajouter plusieurs parfum -->
                <input type="checkbox" name="parfum[]" value="vanille"> Vanille 
                <input type="checkbox" name="parfum[]" value="chocolat"> Chocolat
                <input type="checkbox" name="parfum[]" value="fraise"> Fraise 
        </div>
        <div class = "form-group">
            <h6>Choix support</h6>
            <input type="checkbox" name="support[]" value="pots"> Pots    
            <input type="checkbox" name="support[]" value="cornet"> Cornet    
        </div>
        <div class = "form-group">
            <h6>Choisisser un ou plusieurs supplément</h6>
            <input type="checkbox" name="supplément[]" value="pepites de chocolat"> Pepites de chocolat
            <input type="checkbox" name="supplément[]" value="chantilly"> Chantilly
        </div>
    <button type = "submit" class = "btn btn-primary">validé parfum</button>
</form> 



<h3>Voici votre commande</h3>
<?php foreach($_GET as $k):?>
    <?php foreach($k as $secondArray => $productSelected):?>
        <?php if($secondArray === 0):?> 
            <br>
            <?php 
                echo '<strong> ' . key($_GET) .' </strong>'  . ':';
                next($_GET);
                if($k = null){
                    echo '<strong> ' . key($_GET) .' </strong>'  . ': aucun';
                }
            ?>
        <?php endif?>
        <?php echo $productSelected?>
    <?php endforeach?>
<?php endforeach?>


<h3>$_GET</h3>
<pre>
    <?php var_dump($_GET)?>
</pre>




<?php require  __DIR__ . "/page.php/footer.php"; ?>
