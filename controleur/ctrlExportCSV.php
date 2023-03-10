<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
            $lesLieuLivraison = ModeleObjetDAO::getLieuLivraison();
            if((isset($_POST["type"]) && isset($_POST["lieuLivraison"])) && ($_POST["lieuLivraison"] != "selectionner" && $_POST["type"] != "selectionner")){
                ModeleObjetDAO::bonCommandeCsv($_POST["type"],$_POST["lieuLivraison"]);
                $verifInput = true;
                $reload = true;
            }elseif((isset($_POST["type"]) && isset($_POST["lieuLivraison"])) && ($_POST["lieuLivraison"] == "selectionner" || $_POST["type"] == "selectionner")){
                $verifInput = false;
                $reload = true;
            }
            include_once "$racine/vue/vueExportCSV.php";
    }
    else{
        header("location:./action=accueil");
    }

    include_once "$racine/vue/vuePied.php";


?>

