<?php 
$title = "page d'accueil";
require __DIR__ . "/page.php/header.php"; 
?>
  <div style="display: flex; justify-content:center;">
    <img src="page.php/img/img-glace.jpg" alt="Jampi, artisan glacier" style="height: 144px; width: 180px; transform:rotate(-30deg);">
    <div class="starter-template" style="display: flex; height: 500px; justify-content: center; align-items: center; flex-direction: column;">
      <img src="page.php/img/logo-jampi.png" alt="Jampi, artisan glacier" style="height: 144px; width: 180px; margin: 0 auto;">
      <h1>Bootstrap starter template</h1>
      <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    </div>
    <div style="height: 550px; display: flex; align-items: flex-end; margin-left: 50px;">
      <img src="page.php/img/img-glace.jpg" alt="Jampi, artisan glacier" style="height: 144px; width: 180px; transform:rotate(120deg);">
    </div>
  </div>
<?php require  __DIR__ . "/page.php/footer.php"; ?>

