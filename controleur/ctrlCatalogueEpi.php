<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $verifVet = false;
        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
        $catalogue = ModeleObjetDAO::getCatalogue($unStatut['id'], $_SESSION['login'], $verifVet);
        
        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'EPI');
        
        

        
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');
            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            if(ModeleObjetDAO::insertEPICommande($idUtilisateur, $unStatut['statut']) != false) {
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];
    
                
                ModeleObjetDAO::insertLigneCommandeEPI($idUtilisateur, $idProduit, $quantite, $taille);
                $reload = true;

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


        
        include_once "$racine/vue/vueCatalogueEpi.php";
    }
    include_once "$racine/vue/vuePied.php";
?>