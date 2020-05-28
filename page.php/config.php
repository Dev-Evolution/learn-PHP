<?php
define('HORAIRES', [
        "Lundi" => [["9h00", "12h00"], ["13h00", "17h00"]],
        "Mardi" => [["9h00", "12h00"], ["13h00", "16h00"]],
        "Mercredi" =>[["9h00", "12h00"]],
        "Jeudi" => [["9h00", "12h00"], ["13h00", "16h00"]],
        "Vendredi" => [["9h00", "12h00"], ["13h00", "16h00"]],
        "Samedi" => [],
        "Dimanche" => []
    ]
);

define('JOURS', [
    "Lundi" ,
    "Mardi" ,
    "Mercredi",
    "Jeudi",
    "Vendredi",
    "Samedi",
    "Dimanche" 
    ]
);

define('CRENEAUX', [
        [
            ["9h00", "12h00"], ["13h00", "16h00"]
        ],
        [
            ["9h00", "12h00"], ["13h00", "19h00"]
        ],
        [
            ["9h00", "12h00"]
        ],
        [
            ["9h00", "12h00"], ["13h00", "16h00"]
        ],
        [
            ["9h00", "12h00"], ["13h00", "19h00"]
        ],
        [],
        []
]);

?>