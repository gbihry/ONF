<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $idCateg = $_GET["id"];
        $unProduit = ModeleObjetDAO::getProduit($_GET["id"],substr(($_GET["action"]),-3));
        $unStatut = ModeleObjetDAO::getStatut($_SESSION['login']);
        switch ($unStatut['statut']) {
            case 'Bucheron':
                
            $listeQte = [
                1 => 1, //CHAUSSURE
                2 =>  1, //BOTTE
                3 => 2, //PANTALON/FALSAR
                4 => 1, //CASQUE
                5 => 2, //VESTE
                6 => 1,
            ];

                break;
            case 'Sylviculteur':
                $qte = 3;
                break;
            case 'chauffeur débusqueur':
                $qte = 1;
                break;
            case 'logiticien' :
                $qte = 3;
                break;
            case 'chauffeur d engin' :
                $qte = 4;
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
            ModeleObjetDAO::insertEPICommande($idUtilisateur, $unStatut['statut']);

            
            $quantite = $_POST['quantity'];
            $taille = $_POST['taille'];
            $idProduit = $_POST['submit'];

            ModeleObjetDAO::insertLigneCommandeEPI($idUtilisateur, $idProduit, $quantite, $taille);
            
        }
        include_once "$racine/vue/vueProduitEpi.php";
        
    }
    include_once "$racine/vue/vuePied.php";

    
    
    
    
?>