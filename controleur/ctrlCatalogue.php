<?php 
    include_once "$racine/vue/vueEntete.php";
    
    
    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        include_once "$racine/vue/vueCatalogue.php";
    }
    include_once "$racine/vue/vuePied.php";
    
?>