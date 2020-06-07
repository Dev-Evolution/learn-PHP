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
var selector = document.querySelector('#selectJourJS');
if(selector != null){
    document.addEventListener("DOMContentLoaded", function(){
        for(i = 0; i < jours.length; i++){
            if(creneaux[i][0] != null){
                let newOptionJour = document.createElement("option");
                newOptionJour.text = jours[i];
                newOptionJour.setAttribute("value", jours[i]);
                selector.appendChild(newOptionJour);
            }
        }
    });
}



//add creneaux selector
function creneauxSelector(day){
    if(day === 'Jour'){
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
            if(day == jours[i]){
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
        document.querySelector('.valideCreneaux').style.visibility = 'hidden';
    }
}

function valideCreneaux(selectedCreneau){
    if(selectedCreneau != 'Creneau'){
        document.querySelector('.valideCreneaux').style.visibility = 'visible';
    }
    else{
        document.querySelector('.valideCreneaux').style.visibility = 'hidden';
    }
}


function selectedDay(day){
    if(day.value === 'Jour'){
        document.querySelector('.entrerHeure').style.visibility = 'hidden';
    }
    else{
        var heureEntrer = document.querySelector('#heureEntrer');
        var placehoderCreneau = [];
        for(indexCreneau in creneaux){
            if(day.value === indexCreneau){
                creneaux[indexCreneau].forEach(heure => {
                    placehoderCreneau.push(heure[0] + " et " + heure[1]);
                });
                placehoderCreneau = "entre " + placehoderCreneau.join(' ou ');
            }
        }
        heureEntrer.setAttribute("placeholder", placehoderCreneau);
        document.querySelector('.entrerHeure').style.visibility = 'visible';
    }
};

function valideHeure(heureEntrer){
    console.log(heureEntrer);
    var verifierHeure = document.querySelector(".verifierHeure");
    if(heureEntrer != ""){
        verifierHeure.style.pointerEvents = 'auto';
        verifierHeure.style.opacity = "1";
        verifierHeure.style.backgroundColor = "#007bff";
        verifierHeure.style.borderColor = "#007bff";
    }
    else{
        verifierHeure.style.pointerEvents = 'none';
        verifierHeure.style.opacity = "0.65";
        verifierHeure.style.backgroundColor = "grey";
        verifierHeure.style.borderColor = "grey";
    }
};





