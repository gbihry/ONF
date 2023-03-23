<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && $roleUser == 'Administrateur'){
        
        if(isset($_GET["ref"])){
            if($_GET["ref"] == 1){
                $resultat = ModeleObjetDAO::resetBdd();
                if($resultat == true){
                    $reussite = false;
                }
                else{
                    $reussite = true;
                }
            }
        }
        
        include_once "$racine/vue/vueBdd.php";
    }
    else{
        header("location:./action=accueil");
    }


    
    include_once "$racine/vue/vuePied.php";


?>

