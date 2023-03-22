<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }
    $role = ModeleObjetDAO::getRole($_SESSION['login']);
    if($_GET["id"] != "0"){
        $verifVet = false;
        $array = array(
            "id" => $_GET["id"],
        );
        $id = $array;
        $login = ModeleObjetDAO::getLoginById($_GET["id"]);
        $unStatut = ModeleObjetDAO::getStatut($login["login"]);
        $catalogue = ModeleObjetDAO::getCatalogue($_GET["id"], $login["login"], $verifVet);
        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'EPINonOuvrier', NULL);
        
        include_once "$racine/vue/vueCatalogueEpiNonOuvrier.php";
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');
            
            if(ModeleObjetDAO::insertEPICommande($id, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];
                $nomProduit = ModeleObjetDAO::getProduitPanier($_POST['submit'])['nom'];
                $idChef = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $description = "Ajout de ". $quantite ." produit(s) ".$nomProduit." dans le panier de ".$login["login"] ." par ".$_SESSION['login'];
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$idChef["id"]);
                
                
                ModeleObjetDAO::insertLigneCommandeEPI($id, $idProduit, $quantite, $taille);

            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
            
        }

    }elseif($_GET["id"] == "0"){  
        
        $verifVet = false;
        $leLogin = $_SESSION['login'];
        $login = array(
            "login" => $leLogin,
        );
        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
        $catalogue = ModeleObjetDAO::getCatalogue($unStatut['id'], $_SESSION['login'], $verifVet);
        $array = array(
            "id" => "0",
        );
        $id = $array;
        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'EPINonOuvrier', NULL);

        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){
            date_default_timezone_set('Europe/Paris');
            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            if(ModeleObjetDAO::insertEPICommande($idUtilisateur, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];
                $nomProduit = ModeleObjetDAO::getProduitPanier($_POST['submit'])['nom'];
                $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $description = "Ajout de ". $quantite ." produit(s) ".$nomProduit." au panier par ".$_SESSION['login'];
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$id["id"]);
                ModeleObjetDAO::insertLigneCommandeEPI($idUtilisateur, $idProduit, $quantite, $taille);
                $reload = true;

            } else {
                echo "Erreur lors de l'insertion de la commande";
            }  
        }




        
        include_once "$racine/vue/vueCatalogueEpiNonOuvrier.php";
    }
    include_once "$racine/vue/vuePied.php";
?>