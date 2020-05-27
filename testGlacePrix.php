
<?php require "page.php/header.php"?>
<?php require "page.php/testListeChoixGlace.php"?>


<form action="/testGlacePrix.php" method = "GET">
        <div class = "form-group">
            <h6>Choisisser un ou plusieurs parfum</h6>
            <?php $htmlParfums = testListeChoix("parfums");
                  echo $htmlParfums;
            ?>
        </div>
        <div class = "form-group">
            <h6>Choix contenant</h6>
            <?php $htmlContenants = testListeChoix("contenants");
                  echo $htmlContenants;
            ?> 
        </div>
        <div class = "form-group">
            <h6>Choisisser un ou plusieurs supplémant</h6>
            <?php $htmlSuppléments = testListeChoix("suppléments");
                  echo $htmlSuppléments;
            ?>
        </div>
    <button type = "submit" class = "btn btn-primary">validé</button>
</form> 


<h3>Voici votre commande</h3>
<?php foreach($_GET as $k):?>
    <?php foreach($k as $secondArray => $productSelected):?>
        <?php if($secondArray === 0):?> 
            <?php 
                echo '<strong> ' . key($_GET) .' </strong>'  . ':';
                next($_GET);
            ?>
        <?php endif?>
        <?php echo $productSelected;?>
    <?php endforeach?>
    <br>
<?php endforeach?>
<br>

<div style ="display: flex; border: solid 2px red; width: 300px; height: 60px;">
    <div  style ="margin: auto 0 auto 16px;">
        Voici le prix:
    </div>
</div>

<br>
<h3>$_GET</h3>
<pre>
    <?php var_dump($_GET)?>
</pre>


<?php require  __DIR__ . "/page.php/footer.php"; ?>