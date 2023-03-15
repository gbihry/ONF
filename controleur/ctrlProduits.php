<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include "$racine/vue/vueEntete.php";
    $role =  ModeleObjetDAO::getRole($_SESSION['login'])['libelle'];

    if(isset($_SESSION['autorise']) && $role == 'Administrateur' || isset($_SESSION['autorise']) && $role == 'Super-Administrateur'){
        
        $allProductsEPI = ModeleObjetDAO::getAllProductsModif('EPI');
        $allType = ModeleObjetDAO::getTypeProduit();

        if (isset($_POST['idProduit']) && $_POST['idProduit'] != 'undefined'){
            ModeleObjetDAO::updateDescription($_POST['idProduit'], $_POST['description']);
            $modifDesc = true;
            $reload = true;
        }
        if(isset($_GET['idDelete']) && !empty($_GET['idDelete'])){
        $nomPhoto = ModeleObjetDAO::getPhoto($_GET['idDelete']);
        if ($nomPhoto != null){

            $idProduitDelete = $_GET['idDelete'];
            $nomProduit = ModeleObjetDAO::getProduitPanier($idProduitDelete);
            $id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])["id"];
            $description = "L'utilisateur ".$_SESSION['login']." à supprimer le produit ".$nomProduit['nom'];
            $date = date( "Y-m-d H:i:s");
            ModeleObjetDAO::insertLog($date,$description,$id);
            ModeleObjetDAO::deleteProduits($_GET['idDelete']);
            $supprimer = true;
            
            if ($nomPhoto != null && file_exists("images/produits/".$nomPhoto)){
                $statusPhoto = unlink('images/produits/'.$nomPhoto); 
            } 
            header("location:./?action=produits");
        }
        $reload = true;
        }
        if(isset($_POST['idType']) && !empty($_POST['idType'])){
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