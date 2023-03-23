<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }
    if ($verifCommandeEPI == 1){
        header("location:./?action=accueil");
    }else{  
        $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
        isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'quantiteEPINonOuvrier':
                    
                    $idType = ModeleObjetDAO::getIdTypeByLigneCommande($_POST['idLigne']);
                    $unStatut = ModeleObjetDAO::getStatut($_SESSION['login'])['statut'];

                    $max = ModeleObjetDAO::getQuantiteEpiNonOuvrierMax($unStatut,$idType);

                    if ($max < $_POST['quantiteEPINonOuvrier']){
                        $_POST['quantiteEPINonOuvrier'] = $max;
                    }elseif($_POST['quantiteEPINonOuvrier'] <= 0){
                        $_POST['quantiteEPINonOuvrier'] = 1;
                    }
                    ModeleObjetDAO::updateQuantite($idUtilisateur['id'], $_POST['idLigne'], $_POST['quantiteEPINonOuvrier'], 'EPINonOuvrier');
                    $reload = true;
                    break;
                case 'tailleEPI':
                    ModeleObjetDAO::updateTaille($idUtilisateur['id'], $_POST['idLigne'], $_POST['tailleEPINonOuvrier'], 'EPINonOuvrier');
                    $reload = true;
                    break;
                default:
                    $reload = false;
                    break;
            }
            

        
        if(isset($_POST['idLigne']) && isset($_POST['type']) && isset($_POST['idproduit'])){
            ModeleObjetDAO::deleteLigneCommande($idUtilisateur['id'], $_POST['idLigne'],$_POST['type']);
            date_default_timezone_set('Europe/Paris');
            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            $nomProduit = ModeleObjetDAO::getProduitPanier($_POST['idproduit'])['nom'];
            $description = "Suppression de l'article ".$nomProduit ." par ".$_SESSION['login'];
            $date = date( "Y-m-d H:i:s"); 
            ModeleObjetDAO::insertLog($date,$description,$id["id"]);
        }

        $ligneCommandeEPI = ModeleObjetDAO::getLigneCommandeEpiUtilisateur($idUtilisateur['id']);
        include_once "$racine/vue/vuePanierEPINonOuvrier.php";
    }
    include_once "$racine/vue/vuePied.php";
?>