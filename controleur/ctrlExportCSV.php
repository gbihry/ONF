<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
            
            if(isset($_POST["exportCsv"])){
                
                switch($_POST["exportCsv"]){
                    case "VET":
                        ModeleObjetDAO::bonCommandeCsv('VET');
                        break;
                    case "EPI":
                        ModeleObjetDAO::bonCommandeCsv('EPI');
                        break;
                }
            }
            

            include_once "$racine/vue/vueExportCSV.php";
    }
    else{
        header("location:./action=accueil");
    }


    
    include_once "$racine/vue/vuePied.php";


?>

