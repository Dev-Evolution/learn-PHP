const jours = [
    "Lundi" ,
    "Mardi" ,
    "Mercredi",
    "Jeudi",
    "Vendredi",
    "Samedi",
    "Dimanche" 
];
const creneaux = [
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
]


//add day in "selectJourJS" selector
document.addEventListener("DOMContentLoaded", function(){
    for(i = 0; i < jours.length; i++){
        if(creneaux[i][0] != null){
            var selector = document.querySelector('#selectJourJS');
            var newOptionJour = document.createElement("option");
            newOptionJour.text = jours[i];
            newOptionJour.setAttribute("value", jours[i]);
            selector.appendChild(newOptionJour);
        }
    }
});


//add creneaux selector
function creneauxSelector(day){
    if(day.value == 'Jour'){
        document.querySelector('.choiceCreneauJS').style.visibility = 'hidden';
    }
    else{
        //remove old creneaux
        var removeOptionCreneaux = document.querySelectorAll("#selectCreneauJS option");
        for(i = 0; i < removeOptionCreneaux.length; i++){
            if(removeOptionCreneaux[i].value != "Creneau"){
                removeOptionCreneaux[i].parentNode.removeChild(removeOptionCreneaux[i]);
            }
        }
        //add new creneaux
        for(i = 0; i < jours.length; i++){
            if(day.value == jours[i]){
                var selector = document.querySelector('#selectCreneauJS');
                var newOptionCreneau = document.createElement("option");
                newOptionCreneau.text = creneaux[i];
                newOptionCreneau.setAttribute("value", creneaux[i]);
                selector.appendChild(newOptionCreneau);
            }
        }
        document.querySelector('.choiceCreneauJS').style.visibility = 'visible';
    }
}


function selectedDayPHP(day){
    if(day.value == 'Jour'){
        document.querySelector('.choiceCreneau').style.visibility = 'hidden';
    }
    else{
        document.querySelector('.choiceCreneau').style.visibility = 'visible';
    }
}







