<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Gestionnaire de commande'){
        $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
        $agence = ModeleObjetDAO::getIdAgence($id)['Agence'];
        $i = $_GET["ref"];
        switch ($i) {
            case 1:
                $lesLieuLivraison = ModeleObjetDAO::getLieuLivraison();
                if((isset($_POST["type"]) && isset($_POST["lieuLivraison"])) && ($_POST["lieuLivraison"] != "selectionner" && $_POST["type"] != "selectionner")){
                    $choix = "lieuLivraison";
                    ModeleObjetDAO::bonCommandeCsv($_POST["type"],$_POST["lieuLivraison"],$choix,$agence);
                    $verifInput = true;
                    $reload = true;
                }elseif((isset($_POST["type"]) && isset($_POST["lieuLivraison"])) && ($_POST["lieuLivraison"] == "selectionner" || $_POST["type"] == "selectionner")){
                    $verifInput = false;
                    $reload = true;
                }
                break;
            case 2:
                $lesFournisseur = ModeleObjetDAO::getAllFournisseur();
                if((isset($_POST["type"]) && isset($_POST["fournisseur"])) && ($_POST["fournisseur"] != "selectionner" && $_POST["type"] != "selectionner")){
                    $choix = "fournisseur";
                    ModeleObjetDAO::bonCommandeCsv($_POST["type"],$_POST["fournisseur"],$choix,$agence);
                    $verifInput = true;
                    $reload = true;
                }elseif((isset($_POST["type"]) && isset($_POST["fournisseur"])) && ($_POST["fournisseur"] == "selectionner" || $_POST["type"] == "selectionner")){
                    $verifInput = false;
                    $reload = true;
                }
                
                break;
            case 3:
                $test = true;
                $Fournisseur = ModeleObjetDAO::getAllFournisseur();
                $LieuLivraison = ModeleObjetDAO::getLieuLivraison();
                if(isset($_POST["type"]) && isset($_POST["fournisseur"]) && isset($_POST["lieuLivraison"]) && $_POST["lieuLivraison"] != "selectionner" && $_POST["fournisseur"] != "selectionner" && $_POST["type"] != "selectionner"){
                    ModeleObjetDAO::bonCommandeFournisseurLieuCsv($_POST["type"],$_POST["fournisseur"],$_POST["lieuLivraison"],$agence);
                    $verifInput = true;
                    $reload = true;
                }elseif((isset($_POST["type"]) && isset($_POST["fournisseur"]) && isset($_POST["lieuLivraison"])) && ($_POST["fournisseur"] == "selectionner" || $_POST["type"] == "selectionner" || $_POST["lieuLivraison"] == "selectionner")){
                    $verifInput = false;
                    $reload = true;
                }
                
                break;
        }
            include_once "$racine/vue/vueExportCSV.php";
    }
    else{
        header("location:./action=accueil");
    }

    include_once "$racine/vue/vuePied.php";


?>

