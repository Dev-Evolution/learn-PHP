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
        //ajout nouveaux creneaux
        for(i = 0; i < jours.length; i++){
            if(day.value == jours[i]){
                    //creation des creneaux de rendez-vous
                let creneauxOuverture = creneaux[i];
                for(k = 0; k < creneauxOuverture.length; k++){
                    (function(heureCreneau){
                        let heureFermeture = parseInt(creneauxOuverture[k][1].substring(0, 1), 10);
                        if(parseInt(creneauxOuverture[k][0].substring(0, 1), 10) === heureFermeture){
                            return false;
                        }else{
                            ajoutCreneau(heureCreneau);
                        }
                        heureCreneau += 1;
                        console.log(creneauxOuverture[k]);
                    })(parseInt(creneauxOuverture[k][0].substring(0, 1), 10))
                }
                    //ajout des creneaux de rendez-vous
                function ajoutCreneau (heureCreneau){
                    var selector = document.querySelector('#selectCreneauJS');
                    var newOptionCreneau = document.createElement("option");
                    newOptionCreneau.text = creneaux[i];
                    newOptionCreneau.setAttribute("value", creneaux[i]);
                    selector.appendChild(newOptionCreneau);
                }
            }
        }
        document.querySelector('.choiceCreneauJS').style.visibility = 'visible';
    }
}

function valideCreneaux(selectedCreneau){
    if(selectedCreneau.value != 'Creneau'){
        document.querySelector('.valideCreneaux').style.visibility = 'visible';
    }
}

function selectedDayPHP(day){
    if(day.value == 'Jour'){
        document.querySelector('.entrerHeure').style.visibility = 'hidden';
    }
    else{
        document.querySelector('.entrerHeure').style.visibility = 'visible';
    }
}


//button active = background color: #007bff




