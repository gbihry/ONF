<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    
<<<<<<< HEAD
    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
=======
    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' || 
    ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
>>>>>>> 60acf7f4a4cd9b549ecacae951622d112f45d2a7
        $AllUsersAcommander = ModeleObjetDAO::getUtilisateurCommander(1);
        $AllUsersNoncommander = ModeleObjetDAO::getUtilisateurCommander(0);
    } else {
        header("location:./?action=accueil");
    }

    




    include_once "$racine/vue/vueAcommander.php";
    include_once "$racine/vue/vuePied.php";

?> 