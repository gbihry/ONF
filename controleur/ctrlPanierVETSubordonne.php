<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $id = $_GET["id"];
        if(isset($_POST['idLigne']) && isset($_POST['type'])){
            ModeleObjetDAO::deleteLigneCommande($id, $_POST['idLigne'],$_POST['type']);

            date_default_timezone_set('Europe/Paris');
            $login = ModeleObjetDAO::getLoginById($id);
            $idChef = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            $nomProduit = ModeleObjetDAO::getProduitPanier($_POST['idproduit'])['nom'];
            $description = "Suppression de l'article ".$nomProduit ." dans le panier de ". $login["login"]." par ".$_SESSION['login'];
            $date = date( "Y-m-d H:i:s"); 
            ModeleObjetDAO::insertLog($date,$description,$idChef["id"]);
        }

        $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($id);

        include_once "$racine/vue/vuePanierVETSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
?>