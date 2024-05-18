var btnajouter = document.getElementById("btnajouter");
var btnchauffeur = document.getElementById("btnchauffeur");
var btnattente =document.getElementById("btnattente");
var btncours =document.getElementById("btncours");
var btnterminer =document.getElementById("btnterminer");


var divajouter = document.getElementById("divajouter");
var divchauffeur = document.getElementById("divchauffeur");
var divattente =document.getElementById("divattente");
var divenCours =document.getElementById("divenCours");
var divterminer =document.getElementById("divterminer");
var sectionaccueil = document.getElementById("accueil");

divajouter.style.display = "none";
divchauffeur.style.display = "none";
divattente.style.display = "none";
divenCours.style.display = "none";
divterminer.style.display = "none";

var tab = Array(btnajouter, btnchauffeur,btnattente,btncours,btnterminer);
function mycolor(btn){
    tab.forEach(element => {
        if(element != btn){
            element.style.backgroundColor = "#f0f0f0";
        }
    });
    btn.style.backgroundColor = "#004878";
}

var bab = Array(divajouter, divchauffeur, divattente, divenCours, divterminer, sectionaccueil);
function myblock(btn){
    bab.forEach(element =>{
        if(element != btn){
            element.style.display = "none";
        }
    });
    btn.style.display = "block";
}


function blockhover(btn){
    if(btn == btnajouter){
        myblock(divajouter);
        mycolor(btnajouter);
    }
    else if(btn == btnchauffeur){
        myblock(divchauffeur);
        mycolor(btnchauffeur);
    }
    else if(btn == btnattente){
        myblock(divattente);
        mycolor(btnattente);
    }
    else if(btn == btncours){
        myblock(divenCours);
        mycolor(btncours);
    }
    else if(btn == btnterminer){
        myblock(divterminer);
        mycolor(btnterminer);
    }
    else if(btn == sectionaccueil){
        myblock(sectionaccueil);
    }
}

btnajouter.addEventListener('click', () => blockhover(btnajouter), true);
btnchauffeur.addEventListener('click', () => blockhover(btnchauffeur), true);
btnattente.addEventListener('click', () => blockhover(btnattente), true);
btncours.addEventListener('click', () => blockhover(btncours), true);
btnterminer.addEventListener('click', () => blockhover(btnterminer), true);