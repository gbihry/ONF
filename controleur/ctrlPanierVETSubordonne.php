<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $idUtilisateur = $_GET['id'];
        isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'quantiteVETSub':
                    ModeleObjetDAO::updateQuantite($idUtilisateur, $_POST['idLigne'], $_POST['quantiteVETSub'], 'VET');
                    $reload = true;
                    break;
                case 'tailleVETSub':
                    ModeleObjetDAO::updateTaille($idUtilisateur, $_POST['idLigne'], $_POST['tailleVETSub'], 'VET');
                    $reload = true;
                    break;
                default:
                    $reload = false;
                    break;
            }

        if(isset($_POST['idproduit']) && isset($_POST['type'])){
            ModeleObjetDAO::deleteLigneCommande($idUtilisateur, $_POST['idLigne'],$_POST['type']);

            date_default_timezone_set('Europe/Paris');
            $login = ModeleObjetDAO::getLoginById($idUtilisateur);
            $idChef = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            $nomProduit = ModeleObjetDAO::getProduitPanier($_POST['idproduit'])['nom'];
            $description = "Suppression de l'article ".$nomProduit ." dans le panier de ". $login["login"]." par ".$_SESSION['login'];
            $date = date( "Y-m-d H:i:s"); 
            ModeleObjetDAO::insertLog($date,$description,$idChef["id"]);
        }

        $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($idUtilisateur);
        $pointUtilisateur = ModeleObjetDAO::getNbrPointUtilisateur($idUtilisateur)['point'];

        include_once "$racine/vue/vuePanierVETSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
?>