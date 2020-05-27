
<?php 
  function menu_item($nav_title, $link, $classLink){
    $itemSelected = substr($_SERVER['SCRIPT_NAME'], 1);
    $classe = 'nav-item';
    if($link === $itemSelected){
      $classe = $classe . ' active';
    }
    return '<li class="' . $classe . '">
      <a class="' . $classLink . '" href="' . $link . '"> ' . $nav_title . ' </a>
    </li>';
  }

          //autre syntaxe possible: heredoc
//     return <<<HTML
//     <li class="$classe">
//       <a class="nav-link" href="$link">$nav_title</a>
//     </li>;
//     }
// HTML


function navlink ($classLink = " "){
   
    return
         menu_item("Home", "index.php", $classLink) .
         menu_item("Contact", "contact.php", $classLink) .
         menu_item("Jeux", "jeux.php", $classLink) .
         menu_item("Glace", "glace.php", $classLink) .
         menu_item("test prix Glace", "testGlacePrix.php", $classLink).
         menu_item("valide prix Glace", "validePrixGlace.php", $classLink);
}

 
function listeChoix($name, $value){
  $attribute = '';
  if(isset($_GET[$name]) && in_array($value, $_GET[$name])){
      $attribute .= 'checked';
  }
  if($name == "contenants"){
      return '<input type="radio" name = "' . $name . '[]' . '" value = "' . $value  . '" ' . $attribute . '>';
  }
  return '<input type="checkbox" name = "' . $name . '[]' . '" value = "' . $value . '" ' . $attribute . '>';
}      

function resultats($parfums, $contenants, $supplements){
  $ingredients = [];
  $total = 0;
  // if(isset($_GET['parfums'])){
  //   foreach($_GET['parfums'] as $parfum){
  //     if(isset($parfums[$parfum])){
  //       $ingredients[] = $parfum;
  //       $total += $parfums[$parfum];
  //     }
  //   }
  // }
  // if(isset($_GET['contenants'])){
  //   foreach($_GET['contenants'] as $contenant){
  //     if(isset($contenants[$contenant])){
  //       $ingredients[] = $contenant;
  //       $total += $contenants[$contenant];
  //     }
  //   }
  // }
  // if(isset($_GET['supplements'])){
  //   foreach($_GET['supplements'] as $supplement){
  //     if(isset($supplements[$supplement])){
  //       $ingredients[] = $supplement;
  //       $total += $supplements[$supplement];
  //     }
  //   }
  // }

        // optimisation du code pour parfums et supplements
  foreach(['parfums', 'supplements', 'contenants'] as $name){
    if(isset($_GET[$name])){
      $choix = $_GET[$name];
        foreach($choix as $value){
          if(isset($$name[$value])){
            $ingredients[] = $value;
            $total += $$name[$value];
          }
        }
    }
  }

  ?>
     
  <div>
    <strong>Votre glace:</strong>
    <ul>
      <?php foreach($ingredients as $ingredient):?> 
        <li><?= $ingredient?></li>
      <?php endforeach?>
    </ul>
  </div>
  <div>
    <strong>Prix:</strong>
    <?= $total?>€
  </div>
  <?php
}

function creneaux_html(array $horaires){
  $phrase = [];
  foreach($horaires as $creneaux){
    $phrase[] = $creneaux[0] . ' à ' . $creneaux[1];
  }
  if(empty($phrase)){
    $phrase[] = "fermé";
  }
  return implode(' et de ', $phrase);
}
 
function creneaux_html_1(array $horaire, array $jours){
  $ouverture = [];
  foreach($horaire as $kCreneaux => $creneaux){
    foreach($jours as $kJour => $jour){
      if($kJour === $kCreneaux){
        $ouverture[] = '<li style="circle">' . $jour . ' : ';
        if(count($creneaux) > 0){
          foreach($creneaux as $k => $creneau){
              if($k > 0 && $k < count($creneaux)){
                $ouverture[] = " et de ";
              }
              $ouverture[] = implode(" à ", $creneau);
          }
        }
        else{
          $ouverture[] = 'fermé </li>';
        }
      }
    }
  }
  return implode($ouverture);
}

  // DEUXIEME SOLUTION:
function creneaux_html_2(array $jours){
  $resultat = [];
  foreach($jours as $jour => $creneaux){
    $resultat[] = '<li style="circle">' . $jour . ' : ';
    if(count($creneaux) > 0){
      foreach($creneaux as $k => $creneau){
        if($k > 0 && $k < count($creneaux)){
          $resultat[] = " et de ";
        }
        $resultat[] = implode(" à ", $creneau);
      }
    }
    else{
      $resultat[] = 'fermé </li>';
    }
  }
  return implode($resultat);
}


function in_creneaux(int $heure, array $creneaux): bool{
  if(empty($creneaux)){
    return false;
  }
  else{
    foreach($creneaux as $creneau){
      if((int)substr($creneau[0], 0, 2)  <= $heure && $heure < (int)substr($creneau[1], 0, 2)){
        return true;
      }
    }
    return false;
  }
}


?>


