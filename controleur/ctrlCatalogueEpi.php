<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $verifVet = false;
        $catalogue = ModeleObjetDAO::getCatalogue(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], $_SESSION['login'], $verifVet);
        include_once "$racine/vue/vueCatalogueEpi.php";
    }
    include_once "$racine/vue/vuePied.php";
?>