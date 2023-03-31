<?php
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";
    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        $id = $_GET["id"];
        if(isset($_GET['idDelete']) && isset($_GET['type'])){    
            $type = $_GET['type'];
            $idCommande = $_GET['idDelete'];
            ModeleObjetDAO::deleteLigneCommandeSub($type,$idCommande);
            ModeleObjetDAO::deleteCommandeSub($type,$idCommande,$id);
            $reload = true;
        }
        
        $HistoriqueCommande = ModeleObjetDAO::getHistoriqueCommande($id);
        include_once "$racine/vue/vueHistoriqueCommandeSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
