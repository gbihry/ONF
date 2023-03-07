<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
        isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'quantiteVET':
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

        if(isset($_POST['idLigne']) && isset($_POST['type'])){
            ModeleObjetDAO::deleteLigneCommande($idUtilisateur['id'], $_POST['idLigne'],$_POST['type']);
        }

        $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($idUtilisateur['id']);

        include_once "$racine/vue/vuePanierVET.php";
    }
    include_once "$racine/vue/vuePied.php";
?>