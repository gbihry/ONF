<?php
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $id = $_GET["ref"];
        
        $HistoriqueCommandeDetail = ModeleObjetDAO::getHistoriqueCommandeDetail($id, $_GET['id'], $_GET['type']);
        include_once "$racine/vue/vueHistoriqueCommandeDetailSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
