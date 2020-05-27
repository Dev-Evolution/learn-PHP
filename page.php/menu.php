<?php 
  if(function_exists("menu_item") === false){
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
  
  }
?>

<?php echo(menu_item("Home", "index.php", $classLink));?>
<?php echo(menu_item("Contact", "contact.php", $classLink));?>
<?php echo(menu_item("Jeux", "jeux.php", $classLink));?>
<?php echo(menu_item("Glace", "glace.php", $classLink));?>
