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
        
        $catalogue = ModeleObjetDAO::getCatalogue($unStatut['id'], $login["login"], $verifVet, 'EPI');
        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'EPI',null);
        
        
        
        include_once "$racine/vue/vueCatalogueEpi.php";
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');
            
            if(ModeleObjetDAO::insertEPICommande($id, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];

                $idTypeProduit = ModeleObjetDAO::getTypeByIdProduit($idProduit);
                $max = ModeleObjetDAO::getQuantiteEpiMax($unStatut['statut'],$idTypeProduit);

                if ($quantite > $max){
                    $quantite = $max;
                }

                $idChef = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $nomProduit = ModeleObjetDAO::getProduitPanier($idProduit)['nom'];
                $tailleDescription = ModeleObjetDAO::getTaille($taille)['libelle'];
                $description = "Ajout de ". $quantite ." produit(s), ".$nomProduit." taille : " .$tailleDescription . "dans le panier de ".$login["login"] ." par ".$_SESSION['login'];
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$idChef["id"]);
                
                echo ModeleObjetDAO::insertLigneCommandeEPI($id, $idProduit, $quantite, $taille);

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
        if ($roleUser == 'Administrateur' || $roleUser == 'Gestionnaire de commande'){
            $catalogue = ModeleObjetDAO::getCatalogue($unStatut['id'], $leLogin, $verifVet, 'EPI');
            $catalogueNonOuvrier = ModeleObjetDAO::getCatalogue($unStatut['id'], $leLogin, $verifVet, 'EPINonOuvrier');
            $catalogue = array_merge($catalogue, $catalogueNonOuvrier);
        }else{
            $catalogue = ModeleObjetDAO::getCatalogue($unStatut['id'], $leLogin, $verifVet, 'EPI');
        }
        $array = array(
            "id" => "0",
        );
        $id = $array;
        $allProducts = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'EPI',null);
        
        if ($roleUser == 'Administrateur' || $roleUser == 'Gestionnaire de commande'){
            $allProducts = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'EPIAdmin',null);
        }

        
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){
            date_default_timezone_set('Europe/Paris');
            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            if(ModeleObjetDAO::insertEPICommande($idUtilisateur, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];
            

                $idTypeProduit = ModeleObjetDAO::getTypeByIdProduit($idProduit);
                $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
                $max = ModeleObjetDAO::getQuantiteEpiMax($unStatut['statut'],$idTypeProduit);

                if ($quantite > $max){
                    $quantite = $max;
                }

                $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
                $nomProduit = ModeleObjetDAO::getProduitPanier($idProduit)['nom'];
                $description = "Ajout de ". $quantite ." produit(s) ".$nomProduit." taille : " .$tailleDescription. " au panier par ".$_SESSION['login'];
                $date = date( "Y-m-d H:i:s");
                ModeleObjetDAO::insertLog($date,$description,$id["id"]);
                
                
                ModeleObjetDAO::insertLigneCommandeEPI($idUtilisateur, $idProduit, $quantite, $taille);
                $reload = true;

            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
            
            
        }
        
        include_once "$racine/vue/vueCatalogueEpi.php";
    }
    include_once "$racine/vue/vuePied.php";
?>