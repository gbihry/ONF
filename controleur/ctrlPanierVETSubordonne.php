<?php

    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";

    if (!isset($_SESSION['autorise'])){
        header("location:./?action=login");
    }else{  
        
        $id = $_GET["ref"];
        if(isset($_POST['idLigne']) && isset($_POST['type'])){
            ModeleObjetDAO::deleteLigneCommande($id, $_POST['idLigne'],$_POST['type']);
        }

        $ligneCommandeVET = ModeleObjetDAO::getLigneCommandeVetUtilisateur($id);

        include_once "$racine/vue/vuePanierVETSubordonne.php";
    }
    include_once "$racine/vue/vuePied.php";
?>