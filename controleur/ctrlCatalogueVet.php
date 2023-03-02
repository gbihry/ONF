<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }
    if($_GET["ref"] != "0"){
        $verifVet = true;
        $array = array(
            "id" => $_GET["ref"],
        );
        $id = $array;
        $login = ModeleObjetDAO::getLoginById($_GET["ref"]);
        $unStatut = ModeleObjetDAO::getStatut($login["login"]);
        $catalogue = ModeleObjetDAO::getCatalogue($_GET["ref"], $login["login"], $verifVet);
        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'VET');
        include_once "$racine/vue/vueCatalogueVet.php";
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');

         
            if(ModeleObjetDAO::insertVETCommande($id, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];

                ModeleObjetDAO::insertLigneCommandeVET($id, $idProduit, $quantite, $taille);
            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
        }
    }
    elseif($_GET["ref"] == "0"){  
        $verifVet = true;
        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
        $catalogue = ModeleObjetDAO::getCatalogue($unStatut['id'], $_SESSION['login'], $verifVet);
        $array = array(
            "id" => "0",
        );
        $id = $array;
        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'VET');

        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');

            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            if(ModeleObjetDAO::insertVETCommande($idUtilisateur, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];

                ModeleObjetDAO::insertLigneCommandeVET($idUtilisateur, $idProduit, $quantite, $taille);
                $reload = true;
            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
        }

      
        include_once "$racine/vue/vueCatalogueVet.php";
    }
    include_once "$racine/vue/vuePied.php";
?>