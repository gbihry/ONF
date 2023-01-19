<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $catalogue = ModeleObjetDAO::getCatalogue(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id'], $_SESSION['login']);
        include_once "$racine/vue/vueCatalogueEpi.php";
    }
    include_once "$racine/vue/vuePied.php";
?>