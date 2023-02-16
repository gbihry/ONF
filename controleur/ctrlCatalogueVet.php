<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  

        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
        $verifVet = true;
        $catalogue = ModeleObjetDAO::getCatalogue(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], $_SESSION['login'], $verifVet);
        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'VET');

        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');

            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            if(ModeleObjetDAO::insertVETCommande($idUtilisateur, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];

                ModeleObjetDAO::insertLigneCommandeVET($idUtilisateur, $idProduit, $quantite, $taille);
            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
        }

        $role = ModeleObjetDAO::getRole($_SESSION['login']);
        switch($role['libelle']){
            case 'Responsable' : 
                $responsable = ModeleObjetDAO::getResponsableCommande(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
                $commanderPour = ModeleObjetDAO::getCommanderPour($responsable['id_responsable']);
                break;
            case 'Administrateur' : 
                $commanderPour = ModeleObjetDAO::getCommanderPourTous();
                break;
        }

        include_once "$racine/vue/vueCatalogueVet.php";
    }
    include_once "$racine/vue/vuePied.php";
?>