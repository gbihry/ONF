<?php
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $id = $_GET["id"];
        $HistoriqueCommande = ModeleObjetDAO::getHistoriqueCommande($id);
        include_once "$racine/vue/vueHistoriqueCommandeSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
