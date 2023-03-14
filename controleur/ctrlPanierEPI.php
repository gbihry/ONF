<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
        isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'quantiteEPI':
                    
                    $idType = ModeleObjetDAO::getIdTypeByLigneCommande($_POST['idLigne']);
                    $unStatut = ModeleObjetDAO::getStatut($_SESSION['login'])['statut'];

                    $max = ModeleObjetDAO::getQuantiteEpiMax($unStatut,$idType);

                    if ($max < $_POST['quantiteEPI']){
                        $_POST['quantiteEPI'] = $max;
                    }elseif($_POST['quantiteEPI'] <= 0){
                        $_POST['quantiteEPI'] = 1;
                    }
                    ModeleObjetDAO::updateQuantite($idUtilisateur['id'], $_POST['idLigne'], $_POST['quantiteEPI'], 'EPI');
                    $reload = true;
                    break;
                case 'tailleEPI':
                    ModeleObjetDAO::updateTaille($idUtilisateur['id'], $_POST['idLigne'], $_POST['tailleEPI'], 'EPI');
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
            $description = "Suppression de l'article ". $nomProduit ." par ".$_SESSION['login'];
            $date = date( "Y-m-d H:i:s"); 
            ModeleObjetDAO::insertLog($date,$description,$id);
        }

        $ligneCommandeEPI = ModeleObjetDAO::getLigneCommandeEpiUtilisateur($idUtilisateur['id']);
        include_once "$racine/vue/vuePanierEPI.php";
    }
    include_once "$racine/vue/vuePied.php";
?>