<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if ($dateAuj > $dateFin){
        header("location:./?action=accueil");
    }

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }
    if ($verifCommandeVET == 1){
        header("location:./?action=accueil");
    }else{  
        $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
        isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'quantiteVET':
                    if ($_POST['quantiteVET'] <= 0){
                        $_POST['quantiteVET'] = 1;
                    }
                    ModeleObjetDAO::updateQuantite($idUtilisateur['id'], $_POST['idLigne'], $_POST['quantiteVET'], 'VET');
                    $reload = true;
                    break;
                case 'tailleVET':
                    ModeleObjetDAO::updateTaille($idUtilisateur['id'], $_POST['idLigne'], $_POST['tailleVET'], 'VET');
                    $reload = true;
                    break;
                default:
                    $reload = false;
                    break;
            }

        if(isset($_POST['idLigne']) && isset($_POST['type']) && isset($_POST['idproduit'])){
            ModeleObjetDAO::deleteLigneCommande($idUtilisateur['id'], $_POST['idLigne'],$_POST['type']);
            date_default_timezone_set('Europe/Paris');
            $nomProduit = ModeleObjetDAO::getProduitPanier($_POST['idproduit'])['nom'];
            $description = "Suppression de l'article ". $nomProduit ." par ".$_SESSION['login'];
            $date = date( "Y-m-d H:i:s"); 
            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
            ModeleObjetDAO::insertLog($date,$description,$id);
        }

        $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($idUtilisateur['id']);
        $pointUtilisateur = ModeleObjetDAO::getNbrPointUtilisateur(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'])['point'];
        include_once "$racine/vue/vuePanierVET.php";
    }
    include_once "$racine/vue/vuePied.php";
?>