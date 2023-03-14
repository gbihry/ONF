<?php 
    include_once "$racine/modele/ModeleObjetDAO.php";
    include_once "$racine/vue/vueEntete.php";


    if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
        
        if(isset($_GET["ref"])){
            if($_GET["ref"] == 1){
                $resultat = ModeleObjetDAO::resetBdd();
                foreach($resultat as $unResultat){
                    if($unResultat == true){
                        $reussite = false;
                    }
                }
                $reussite = true;
            }
        }
        
        include_once "$racine/vue/vueBdd.php";
    }
    else{
        header("location:./action=accueil");
    }


    
    include_once "$racine/vue/vuePied.php";


?>

