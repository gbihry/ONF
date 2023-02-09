<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";
    

<<<<<<< HEAD
    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
=======
    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
>>>>>>> 60acf7f4a4cd9b549ecacae951622d112f45d2a7
        
        $RecapEpi = ModeleObjetDAO::getRecapCommandeEpi();

        $RecapVet = ModeleObjetDAO::getRecapCommandeVet();
        
        include "$racine/vue/vueRecapCommande.php";
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>