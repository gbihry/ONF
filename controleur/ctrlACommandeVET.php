<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        $AllUsersAcommanderVET = ModeleObjetDAO::getUtilisateurCommanderVET(1);
        $AllUsersNoncommanderVET = ModeleObjetDAO::getUtilisateurCommanderVET(0);
    }elseif(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Responsable'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        $AllUsersAcommanderVET = ModeleObjetDAO::getUtilisateurCommanderSubordonneVET(1,$id);
        $AllUsersNoncommanderVET = ModeleObjetDAO::getUtilisateurCommanderSubordonneVET(0,$id);
        
    }
    else {
        header("location:./?action=accueil");
    }






    include_once "$racine/vue/vueACommanderVET.php";
    include_once "$racine/vue/vuePied.php";

?>