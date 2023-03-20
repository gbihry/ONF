<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $idUtilisateur = $_GET["id"];
        isset($_POST['type']) ? $type = $_POST['type'] : $type = null;
            switch($type) {
                case 'quantiteEPISub':
                    
                    $idType = ModeleObjetDAO::getIdTypeByLigneCommande($_POST['idLigne']);
                    $loginUtilisateur = ModeleObjetDAO::getLoginById($_GET['id'])['login'];
                    $unStatut = ModeleObjetDAO::getStatut($loginUtilisateur)['statut'];

                    $max = ModeleObjetDAO::getQuantiteEpiMax($unStatut,$idType);

                    if ($max < $_POST['quantiteEPISub']){
                        $_POST['quantiteEPISub'] = $max;
                    }elseif($_POST['quantiteEPISub'] <= 0){
                        $_POST['quantiteEPISub'] = 1;
                    }
                    ModeleObjetDAO::updateQuantite($idUtilisateur, $_POST['idLigne'], $_POST['quantiteEPISub'], 'EPI');
                    $reload = true;
                    break;
                case 'tailleEPISub':
                    ModeleObjetDAO::updateTaille($idUtilisateur, $_POST['idLigne'], $_POST['tailleEPISub'], 'EPI');
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

        $ligneCommandeEPI = ModeleObjetDAO::getLigneCommandeEpiUtilisateur($idUtilisateur);

        include_once "$racine/vue/vuePanierEPISubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
?>