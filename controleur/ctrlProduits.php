<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";
    $role =  ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];

    if(isset($_SESSION['autorise']) && $role == 'Administrateur' || isset($_SESSION['autorise']) && $role == 'Super-Administrateur'){
        
        $allProductsEPI = ModeleObjetDAO::getAllProducts('EPI');
        $allProductsVET = ModeleObjetDAO::getAllProducts('VET');
        $allType = ModeleObjetDAO::getTypeProduit();

        if (isset($_POST['idProduit']) && $_POST['idProduit'] != 'undefined'){
            ModeleObjetDAO::updateDescription($_POST['idProduit'], $_POST['description']);
            $modifDesc = true;
            $reload = true;
        }elseif(isset($_GET['idDelete']) && !empty($_GET['idDelete'])){
            $nomPhoto = ModeleObjetDAO::getPhoto($_GET['idDelete']);
            var_dump($nomPhoto);
            if ($nomPhoto != null){
                ModeleObjetDAO::deleteProduits($_GET['idDelete']);
                $supprimer = true;
                if ($nomPhoto != null && file_exists("images/produits/".$nomPhoto)){
                    $statusPhoto = unlink('images/produits/'.$nomPhoto); 
                } 
            }
            $reload = true;
        }elseif(isset($_POST['idType']) && !empty($_POST['idType'])){
            $idType = $_POST['idType'];
            if ($idType == 'selectionner'){
                $verifType = false;
                $reload = true;
            }else{
                $idProduit = $_GET['idProduitType'];
                ModeleObjetDAO::updateTypeProduit($idProduit, $idType);
                $verifType = true;
                $reload = true;
            }
        }

        include "$racine/vue/vueProduits.php";
    } else {
        header("location:./?action=accueil");
    }
    include "$racine/vue/vuePied.php";
?>