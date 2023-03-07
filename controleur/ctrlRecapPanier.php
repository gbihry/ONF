<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        switch($_GET['type']) {
            case 'vet':
                $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
                $points = ModeleObjetDAO::getNbrPointUtilisateur(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'])['point'];
                if($ligneCommandeVET == false){
                    header("location:./?action=panierVET");
                }
                break;
            case 'epi':
                $ligneCommandeEPI = ModeleObjetDAO::getLigneCommandeEpiUtilisateur(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
                if($ligneCommandeEPI == false){
                    header("location:./?action=panierEPI");
                }
                break;
            default:
                header("location:./?action=accueil");
                break;
        }
        
        if(isset($_POST['validerCommande'])) {
            ModeleObjetDAO::validerCommande(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], $_GET['type']);

            date_default_timezone_set('Europe/Paris');
            
            if($_GET['type'] == "vet"){
                $description = "Validation du panier VET par ".$_SESSION['login'];
            }
            else{
                $description = "Validation du panier EPI par ".$_SESSION['login'];
            }

            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            $date = date( "Y-m-d H:i:s");
            ModeleObjetDAO::insertLog($date,$description,$id);
        }

        include_once "$racine/vue/vueRecapPanier.php";
    }
    include_once "$racine/vue/vuePied.php";
?>