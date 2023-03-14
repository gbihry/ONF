<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }
    if($_GET["ref"] != "0"){
        $idCateg = $_GET["id"];
        $unProduit = ModeleObjetDAO::getProduit($_GET["id"],substr(($_GET["action"]),-3));
        $login = ModeleObjetDAO::getLoginById($_GET["ref"]);
        $unStatut = ModeleObjetDAO::getStatut($login["login"]);
        $array = array(
            "id" => $_GET["ref"],
        );
        $idUtilisateur = $array;

        $uneTaille = ModeleObjetDAO::getTaille($_GET["id"]);

        $idCateg = $_GET["id"];
        $unProduit = ModeleObjetDAO::getProduit($_GET["id"],substr(($_GET["action"]),-3));
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');

            if(ModeleObjetDAO::insertVETCommande($idUtilisateur, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];

                ModeleObjetDAO::insertLigneCommandeVET($idUtilisateur, $idProduit, $quantite, $taille);
            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
        }
        include_once "$racine/vue/vueProduitVet.php";

    }elseif($_GET["ref"] == "0"){  
        
        
        $uneTaille = ModeleObjetDAO::getTaille($_GET["id"]);

        $idCateg = $_GET["id"];
        $unProduit = ModeleObjetDAO::getProduit($_GET["id"],substr(($_GET["action"]),-3));
        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);

        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');

            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            if(ModeleObjetDAO::insertVETCommande($idUtilisateur, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];

                $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $nomProduit = ModeleObjetDAO::getProduitPanier($idProduit)['nom'];
                $description = "Ajout de ". $quantite ." produit(s) ".$nomProduit." au panier par ".$_SESSION['login'];
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$id);

                ModeleObjetDAO::insertLigneCommandeVET($idUtilisateur, $idProduit, $quantite, $taille);
                $reload = true;
            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
        }


        include_once "$racine/vue/vueProduitVet.php";
    }
    include_once "$racine/vue/vuePied.php";
?>