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
            let selector = document.querySelector('#selectJourJS');
            let newOptionJour = document.createElement("option");
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
        document.querySelector('.valideCreneaux').style.visibility = 'hidden';
    }
    else{
        //supprimer les anciens creneaux
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
                    var heureFermeture = parseInt(creneauxOuverture[k][1], 10);
                    var heureCreneau = parseInt(creneauxOuverture[k][0], 10);
                    if(k === 0){
                        heureFermeture -= 1;
                    }
                    while(heureCreneau <= heureFermeture){
                        ajoutCreneau(heureCreneau + 'h00');
                        ajoutCreneau(heureCreneau + 'h30');
                        heureCreneau = heureCreneau + 1;
                    }
                }
                    //ajout des creneaux au DOM
                function ajoutCreneau (heureCreneau){
                    var selector = document.querySelector('#selectCreneauJS');
                    var newOptionCreneau = document.createElement("option");
                    newOptionCreneau.text = heureCreneau;
                    newOptionCreneau.setAttribute("value", heureCreneau);
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
    else{
        document.querySelector('.valideCreneaux').style.visibility = 'hidden';
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




