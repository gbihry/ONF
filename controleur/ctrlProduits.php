<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";
    $role =  ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];

    if(isset($_SESSION['autorise']) && $role == 'Administrateur' || isset($_SESSION['autorise']) && $role == 'Super-Administrateur'){
        
        $allProductsEPI = ModeleObjetDAO::getAllProducts('EPI');
        $allProductsVET = ModeleObjetDAO::getAllProducts('VET');

        if (isset($_POST['idProduit']) && $_POST['idProduit'] != 'undefined'){
            ModeleObjetDAO::updateDescription($_POST['idProduit'], $_POST['description']);
            $reload = true;
        }

        include "$racine/vue/vueProduits.php";
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>