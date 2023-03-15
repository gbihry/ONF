<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";
    $role =  ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];

    if(isset($_SESSION['autorise']) && $role == 'Administrateur' || isset($_SESSION['autorise']) && $role == 'Super-Administrateur'){
        
        $allProductsEPINonOuvrier = ModeleObjetDAO::getAllProductsModif('EPINonOuvrier');
        $allType = ModeleObjetDAO::getTypeProduit();

        if (isset($_POST['idProduit']) && $_POST['idProduit'] != 'undefined'){
            ModeleObjetDAO::updateDescription($_POST['idProduit'], $_POST['description']);
            $modifDesc = true;
            $reload = true;
        }
        if(isset($_GET['idDelete']) && !empty($_GET['idDelete'])){
        $nomPhoto = ModeleObjetDAO::getPhoto($_GET['idDelete']);
        if ($nomPhoto != null){
            ModeleObjetDAO::deleteProduits($_GET['idDelete']);
            $supprimer = true;
            if ($nomPhoto != null && file_exists("images/produits/".$nomPhoto)){
                $statusPhoto = unlink('images/produits/'.$nomPhoto); 
            } 
            header("location:./?action=produitsVetModif");
        }
        $reload = true;
        }

        include "$racine/vue/vueProduitsEpiNonOuvrier.php";
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>