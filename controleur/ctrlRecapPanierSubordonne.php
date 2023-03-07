<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $id = $_GET["ref"];
        switch($_GET['type']) {
            case 'vet':
                $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($id);
                $points = ModeleObjetDAO::getNbrPointUtilisateur($id)['point'];
                if($ligneCommandeVET == false){
                    header("location:./?action=panierVETSubordonne");
                }
                break;
            case 'epi':
                $ligneCommandeEPI = ModeleObjetDAO::getLigneCommandeEpiUtilisateur($id);
                if($ligneCommandeEPI == false){
                    header("location:./?action=panierEPISubordonne");
                }
                break;
            default:
                header("location:./?action=accueil");
                break;
        }
        
        if(isset($_POST['validerCommande'])) {
            ModeleObjetDAO::validerCommande($id, $_GET['type']);

            date_default_timezone_set('Europe/Paris');
            
            $login = ModeleObjetDAO::getLoginById($id);

            if($_GET['type'] == "vet"){
                $description = "Validation du panier VET de ".$login["login"]." par ".$_SESSION['login'];
            }
            else{
                $description = "Validation du panier EPI de ". $login["login"]." par ".$_SESSION['login'];
            }

            $idChef = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            $date = date( "Y-m-d H:i:s");
            ModeleObjetDAO::insertLog($date,$description,$idChef["id"]);
        }

        include_once "$racine/vue/vueRecapPanierSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
?>