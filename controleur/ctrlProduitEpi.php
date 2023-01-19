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
                3 => 2, //PANTALON
                4 => 1, //CASQUE
                5 => 2, //VESTE
                6 => 1, //  DEBARDEUR
            ];

                break;
            case 'Tronçonneuse':
                $qte = 2;
                break;
            case 'Autre':
                $qte = 3;
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