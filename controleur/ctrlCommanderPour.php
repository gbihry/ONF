<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Responsable'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        $AllUsersAcommander = ModeleObjetDAO::getUtilisateurCommanderSubordonne(1,$id);
        $lesSubordonne = ModeleObjetDAO::getSubordonnee(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
        include "$racine/vue/vueCommanderPour.php";
        

    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>