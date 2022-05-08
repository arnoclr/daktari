
let listeHeures = [
    { heure: 08, top: 265 }, 
    { heure: 09, top: 315 }, 
    { heure: 10, top: 365 }, 
    { heure: 11, top: 420 }, 
    { heure: 12, top: 470 }, 
    { heure: 13, top: 520 }, 
    { heure: 14, top: 570 }, 
    { heure: 15, top: 620 }, 
    { heure: 16, top: 675 }, 
    { heure: 17, top: 725 }, 
    { heure: 18, top: 775 }, 
    { heure: 19, top: 828 }, 
    { heure: 20, top: 880 }, 
    { heure: 21, top: 930 }, 
    { heure: 22, top: 980 }, 
    { heure: 23, top: 1030 }, 
    { heure: 00, top: 1085 }
];

function move() {
    let elem = document.getElementById("myBar");
    let elemArrow = document.getElementById("arrow-right");
    let elemP = document.querySelector("#myBar-wrap p");
    let heure = new Date();
    let heureAffichage = heure.getHours();
    let heureActuelle = listeHeures.find(element => element.heure === heureAffichage);

    elem.style.top = heureActuelle.top + 'px';
    elemArrow.style.top = (heureActuelle.top-7) + 'px';
    elemP.style.top = (heureActuelle.top-8) + 'px';
    elemP.innerHTML = heureAffichage;

}
window.onload = move();
