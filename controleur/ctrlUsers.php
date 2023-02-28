<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] != 'Utilisateurs'){
        $allUsers = ModeleObjetDAO::getAllUsers(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'], ModeleObjetDAO::getIdUtilisateur($_SESSION['login']));
        include "$racine/vue/vueUsers.php";

    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>