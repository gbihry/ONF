<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
            
            $i = $_GET["ref"];
            switch ($i) {
                case 1:
                    $toutLesLogs = ModeleObjetDAO::getAllLogs();
                    break;
                case 2:
                    $allLogin = ModeleObjetDAO::getLoginUser();
                    
                    
                    break;
                case 3:
                    
                    $logById = ModeleObjetDAO::getLogByLogin($_POST["utilisateur"]);
                    
                    break;
            }
            include_once "$racine/vue/vueLog.php";
    }
    else{
        header("location:./action=accueil");
    }


    
    include_once "$racine/vue/vuePied.php";


?>

