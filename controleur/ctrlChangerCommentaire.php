<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
        if(!empty($_POST)){
            $message = $_POST['message'];
            ModeleObjetDAO::changerCommentaire($message);
        }
    }else{
        header("location:./action=accueil");
    }


    include_once "$racine/vue/vueChangerCommentaire.php";
    include_once "$racine/vue/vuePied.php";


?>

