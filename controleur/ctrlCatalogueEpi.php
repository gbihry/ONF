<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $verifVet = false;
        $catalogue = ModeleObjetDAO::getCatalogue(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], $_SESSION['login'], $verifVet);

        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
        switch ($unStatut['statut']) {
            case 'Bucheron':
                
            $listeQte = [
                1 => 1, //CHAUSSURE
                2 =>  1, //BOTTE
                3 => 2, //PANTALON
                4 => 1, //CASQUE
                5 => 2, //VESTE
                6 => 1, //  DEBARDEUR
            ];

                break;
            case 'Sylviculteur':
                $listeQte = [
                    1 => 1, //CHAUSSURE
                    2 =>  1, //BOTTE
                    3 => 2, //PANTALON
                    4 => 1, //CASQUE
                    5 => 2, //VESTE
                    6 => 1, //  DEBARDEUR
                ];
                break;
            case 'chauffeur débusqueur':
                $listeQte = [
                    1 => 1, //CHAUSSURE
                    2 =>  1, //BOTTE
                    3 => 2, //PANTALON
                    4 => 1, //CASQUE
                    5 => 2, //VESTE
                    6 => 1, //  DEBARDEUR
                ];
                break;
            case 'logisticien' :
                $listeQte = [
                    1 => 1, //CHAUSSURE
                    2 =>  1, //BOTTE
                    3 => 2, //PANTALON
                    4 => 1, //CASQUE
                    5 => 2, //VESTE
                    6 => 1, //  DEBARDEUR
                ];
                break;
            case 'chauffeur d engin' :
                $listeQte = [
                    1 => 1, //CHAUSSURE
                    2 =>  1, //BOTTE
                    3 => 2, //PANTALON
                    4 => 1, //CASQUE
                    5 => 2, //VESTE
                    6 => 1, //  DEBARDEUR
                ];
                break;
            default:
                $listeQte = [
                    1 => 1, //CHAUSSURE
                    2 =>  1, //BOTTE
                    3 => 2, //PANTALON/FALSAR
                    4 => 1, //CASQUE
                    5 => 2, //VESTE
                    6 => 1,
                ];
                break;
        }

        
        if ((isset($_POST['quantity'])) && ($_POST['quantity'] >= 1)){

            date_default_timezone_set('Europe/Paris');

            $idUtilisateur = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
            if(ModeleObjetDAO::insertEPICommande($idUtilisateur, $unStatut['statut']) != false) {
            
                $quantite = $_POST['quantity'];
                $taille = $_POST['taille'];
                $idProduit = $_POST['submit'];
    
                ModeleObjetDAO::insertLigneCommandeEPI($idUtilisateur, $idProduit, $quantite, $taille);

            } else {
                echo "Erreur lors de l'insertion de la commande";
            }
            
        }


        $allProducts  = ModeleObjetDAO::getAllProduitCatalogue($unStatut, 'EPI');
        include_once "$racine/vue/vueCatalogueEpi.php";
    }
    include_once "$racine/vue/vuePied.php";
?>