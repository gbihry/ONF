var compte_a_rebours = document.getElementById("compte_a_rebours");
var date_actuelle = new Date();
var date_evenement = new Date("Apr 7 16:30:00 2023 GMT+01:00");
var total_secondes = (date_evenement - date_actuelle) / 1000;
var prefixe = "Il reste ";
var suffixe = " secondes pour faire vos commandes";

if (total_secondes < 0)
{
    prefixe = "Cloture du site la date butoir à été dépassé de ";
    suffixe = " secondes"; 
    total_secondes = Math.abs(total_secondes); 
}

if (total_secondes > 0)
{
    var jours = Math.floor(total_secondes / (60 * 60 * 24));
    var heures = Math.floor((total_secondes - (jours * 60 * 60 * 24)) / (60 * 60));
    minutes = Math.floor((total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
    secondes = Math.floor(total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));
}

if (jours == 0){
    compte_a_rebours.innerHTML = prefixe + heures + ' heures ' + minutes + ' minutes et ' + secondes + suffixe;
}else{
    compte_a_rebours.innerHTML = prefixe + jours + ' jours ' + heures + ' heures ' + minutes + ' minutes et ' + secondes + suffixe;
}



