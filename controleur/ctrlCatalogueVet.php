<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $catalogue = ModeleObjetDAO::getCatalogue();
        include_once "$racine/vue/vueCatalogueVet.php";
    }
    include_once "$racine/vue/vuePied.php";
?>