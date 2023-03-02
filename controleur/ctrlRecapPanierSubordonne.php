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
        }

        include_once "$racine/vue/vueRecapPanierSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
?>