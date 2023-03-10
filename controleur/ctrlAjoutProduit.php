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
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];
                move_uploaded_file($tmpName, './images/'.$name);
                ModeleObjetDAO::insertProduit($_POST['reference'],$_POST['photo'],$_POST['nom'],$_POST['type'],$_POST['description'],
                $_POST['fournisseur'],$_POST['typeProduit']);
                $reload = true;
            }
            
            
        }
        include "$racine/vue/vueAjoutProduit.php";

    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>