
<?php 
    function choixGlace($name, $value, $prix){
        $attribute = '';
        $prixChecked = 0;
        if(isset($_GET[substr($name, 0, -2)]) && in_array($value, $_GET[substr($name, 0, -2)])){
            $attribute .= 'checked';
            $prixChecked = $prix;
        }
        
        if($name == "contenant[]"){
            return '<input type="radio" name = "' . $name . '" value = "' . $value  . '" prix = "' . $prixChecked  . '" ' . $attribute . '> ' . $value . ' - ' . $prix . '€<br>';
        }
        return '<input type="checkbox" name = "' . $name . '" value = "' . $value . '" prix = "' . $prixChecked  . '" ' . $attribute . '> ' . $value . ' - ' . $prix . '€<br>';
    }

    function testListeChoix($composantGlace){
        if($composantGlace === "parfums"){
            return
                choixGlace("parfum[]", "vanille", 1.5) .
                choixGlace("parfum[]", "chocolat", 1.5) .
                choixGlace("parfum[]", "fraise", 1.5) .
                choixGlace("parfum[]", "passion", 1.5) .
                choixGlace("parfum[]", "caramel beurre salé", 1.5);
        }
        
        elseif($composantGlace === "contenants"){
            return
                choixGlace("contenant[]", "pot", 1) .
                choixGlace("contenant[]", "cornet", 1) .
                choixGlace("contenant[]", "crêpe", 1.2);
        }
        
        elseif($composantGlace === "suppléments"){
            return
                choixGlace("supplément[]", "chocolat", 0.5) .
                choixGlace("supplément[]", "chantilly", 0.5) .
                choixGlace("supplément[]", "fruit frais", 1);
        }
        
    }

?>


