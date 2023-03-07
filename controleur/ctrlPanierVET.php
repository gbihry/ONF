<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
        if(isset($_POST['idLigne']) && isset($_POST['type'])){
            ModeleObjetDAO::deleteLigneCommande($idUtilisateur['id'], $_POST['idLigne'],$_POST['type']);
            date_default_timezone_set('Europe/Paris');
            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            $description = "Suppression de l'article ".$_POST['idproduit'] ." par ".$_SESSION['login'];
            $date = date( "Y-m-d H:i:s"); 
            ModeleObjetDAO::insertLog($date,$description,$id);
        }

        $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($idUtilisateur['id']);

        include_once "$racine/vue/vuePanierVET.php";
    }
    include_once "$racine/vue/vuePied.php";
?>