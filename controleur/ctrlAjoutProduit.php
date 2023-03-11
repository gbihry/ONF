<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";

    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' || isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
        
        $lesFournisseur = ModeleObjetDAO::getFournisseur();
        $lesType = ModeleObjetDAO::getTypeProduit();
        if(!empty($_POST)){
            if ($_POST['type'] == 'selectionner' || $_POST['fournisseur'] == 'selectionner' || $_POST['typeProduit'] == 'selectionner'){
                return false;
            }else{
                $namePhoto = $_FILES['file']['name'];
                $tmpName = $_FILES['file']['tmp_name'];
                $verifFileArray = explode('.', $_FILES['file']['name']);

                if ($verifFileArray[1] != 'png'){
                    $verifFile = false;
                }else{
                    ModeleObjetDAO::insertProduit($_POST['reference'],$namePhoto,$_POST['nom'],$_POST['type'],$_POST['description'],$_POST['fournisseur'],$_POST['typeProduit']);
                    move_uploaded_file($tmpName, './images/produits/'.$namePhoto);
                    $reload = true;
                    $verifFile = true;
                }
            }
        }
        include "$racine/vue/vueAjoutProduit.php";

    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>