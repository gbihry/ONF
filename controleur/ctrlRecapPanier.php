<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);


        $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($idUtilisateur['id']);
        $ligneCommandeEPI = ModeleObjetDAO::getLigneCommandeEpiUtilisateur($idUtilisateur['id']);
        if ($ligneCommandeEPI == false && $ligneCommandeVET == false){
            header("location:./?action=panier");
        }
        
        if(isset($_POST['validerCommande'])) {
            ModeleObjetDAO::validerCommande($idUtilisateur['id']);
        }

        $points = ModeleObjetDAO::getNbrPointUtilisateur($idUtilisateur['id'])['point'];
        include_once "$racine/vue/vueRecapPanier.php";
    }
    include_once "$racine/vue/vuePied.php";
?>