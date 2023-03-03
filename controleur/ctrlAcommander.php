<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        $AllUsersAcommander = ModeleObjetDAO::getUtilisateurCommander(1);
        $AllUsersNoncommander = ModeleObjetDAO::getUtilisateurCommander(0);
    } elseif(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Responsable'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        $AllUsersAcommander = ModeleObjetDAO::getUtilisateurCommanderSubordonne(1,$id);
        $AllUsersNoncommander = ModeleObjetDAO::getUtilisateurCommanderSubordonne(0,$id);
    }
    else {
        header("location:./?action=accueil");
    }






    include_once "$racine/vue/vueAcommander.php";
    include_once "$racine/vue/vuePied.php";

?>