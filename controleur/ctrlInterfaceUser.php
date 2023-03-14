<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $login = $_SESSION['login'];
        $userId = ModeleObjetDAO::getIdUtilisateur($login)['id'];
        $userSecondName = ModeleObjetDAO::getNomUtilisateur($userId)['nom'];
        $userFirstName = ModeleObjetDAO::getNomUtilisateur($userId)['prenom'];
        $userRole = ModeleObjetDAO::getRole($login)['libelle'];
        $userTel = ModeleObjetDAO::getTelUtilisateur($login);
        $userStatut = ModeleObjetDAO::getStatut($login)['statut'];
        $userPoints = ModeleObjetDAO::getNbrPointUtilisateur($userId)['point'];

        $verifCommandeVet = intVal(ModeleObjetDAO::getUtilisateurCommandeTerminer($userId, 'VET'));
        $verifCommandeEpi = intVal(ModeleObjetDAO::getUtilisateurCommandeTerminer($userId, 'EPI'));

        $idResponsable = ModeleObjetDAO::getIdResponsable($login);
        $responsable = ModeleObjetDAO::getResponsableInterfaceUser($idResponsable);
        
        $historiqueCommande = ModeleObjetDAO::getHistoriqueCommande($userId);

        include_once "$racine/vue/vueInterfaceUser.php";
    }
    include_once "$racine/vue/vuePied.php";
?>