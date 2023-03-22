<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }
    $role = ModeleObjetDAO::getRole($_SESSION['login']);
    if($_GET["ref"] != "0"){
        $idCateg = $_GET["id"];
        
        $login = ModeleObjetDAO::getLoginById($_GET["ref"]);
        $unStatut = ModeleObjetDAO::getStatut($login["login"]);
        $unProduit = ModeleObjetDAO::getProduit($_GET["id"],$unStatut, 'EPI');
        $array = array(
            "id" => $_GET["ref"],
        );
        $idUtilisateur = $array;

        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            
            date_default_timezone_set('Europe/Paris');

                
            if(ModeleObjetDAO::insertEPICommande($idUtilisateur, $unStatut['statut']) != false) {
            
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];
                $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $nomProduit = ModeleObjetDAO::getProduitPanier($idProduit)['nom'];
                $description = "Ajout de ". $quantite ." produit(s) ".$nomProduit." au panier de ". $login["login"]." par ".$_SESSION['login'];
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$id["id"]);
    
                ModeleObjetDAO::insertLigneCommandeEPI($idUtilisateur, $idProduit, $quantite, $taille);

            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
        }
    }
    elseif($_GET["ref"] == "0"){  
        
        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
        $unIdStatut = ModeleObjetDAO::getMetierUtilisateur($_SESSION['login']);
        $idCateg = $_GET["id"];
        if (isset($_GET['type']) && $_GET['type'] == 'EPINonOuvrier'){
            $unProduit = ModeleObjetDAO::getProduit($_GET["id"],$unIdStatut, 'EPINonOuvrier');
        }else{
            $unProduit = ModeleObjetDAO::getProduit($_GET["id"],$unIdStatut, 'EPI');
        }
        
        $login = array(
            "login" => $_SESSION['login'],
        );
    
        
        switch($role['libelle']){
            case 'Responsable' : 
                $responsable = ModeleObjetDAO::getResponsableCommande(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
                $commanderPour = ModeleObjetDAO::getCommanderPour($responsable['id_responsable']);
                break;
            case 'Gestionnaire de commande' : 
                $commanderPour = ModeleObjetDAO::getCommanderPourTous();
                break;
        }
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            
            date_default_timezone_set('Europe/Paris');

            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                
            if(ModeleObjetDAO::insertEPICommande($idUtilisateur, $unStatut['statut']) != false) {
            
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];

                $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $nomProduit = ModeleObjetDAO::getProduitPanier($idProduit)['nom'];
                $description = "Ajout de ". $quantite ." produit(s) ".$nomProduit." au panier par ".$_SESSION['login'];
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$id["id"]);

                ModeleObjetDAO::insertLigneCommandeEPI($idUtilisateur, $idProduit, $quantite, $taille);
                $reload = true;
            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
        }

            
            
        }
        include_once "$racine/vue/vueProduitEpi.php";
        
    include_once "$racine/vue/vuePied.php";


    
    
    
    
?>