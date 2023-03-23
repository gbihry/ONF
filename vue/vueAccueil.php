
<div class="home_wrapper">  
<div class="home_content">
    <br/>
    <h1 style="font-size:3rem" class="home_text">Site d'achat ONF, commune forestier EPI/VET</h1>
    <?php
        if (!isset($_SESSION['autorise'])){
            echo ("<p class='home_text'>Veuillez vous connecter pour pouvoir utiliser toutes les fonctionnalités</p>");
        }else{
            echo ("<p class='home_text'>Vous êtes connecté(e)s, vous pouvez désormais utiliser toutes les fonctionnalités</p>");
        }

        echo('<p class="home_text">' . ModeleObjetDAO::getIdMessageCommentaire()[1] .'</p>');
    ?>
    <?php
        if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur'){
    ?>
        <input type="button" onclick="window.location.href = './?action=changerCommentaire';" class='btn btn-success m-5' value="Changer commentaire"/> <br>
    <?php 
        }
    ?>
    
        <?php 
            if (isset($dateCreaFiniEPI) && $dateCreaFiniEPI != null ){
                echo ('<div class="alert-container">');
                    $date = $dateCreaFiniDate[2] . '/' . $dateCreaFiniDate[1] . '/' . $dateCreaFiniDate[0];
                    $time = $dateCreaFiniTime[0] . 'h' . $dateCreaFiniTime[1] . 'm' . $dateCreaFiniTime[2] . 's';
                    echo ('<div class="alert alert-success" role="alert">Vous avez fait une commande EPI <br> le '.$date.' à '.$time.'</div>');
                echo ('</div>');
            }
            if ($verifCommandeEPI == 0 || $verifCommandeVET == 0){
                ?>
                <div>
                    <?php 
                    if (($verifCommandeVET == 0) && ($metier == 1 || $metier == 2 ||$metier == 3|| $metier == 4)){
                        echo ('<input type="button" onclick="window.location.href =\'./?action=catalogueVet&&id=0\'" class="btn btn-success m-3" value="Catalogue VET"/> ');
                    }
                    if($verifCommandeEPI == 0){
                        if ($metier == 1 || $metier == 2 ||$metier == 3 || $metier == 4){
                            echo ('<input type="button" onclick="window.location.href =\'./?action=catalogueEpi&&id=0\'" class="btn btn-success m-3" value="Catalogue EPI"/> ');
                        }else{
                            echo ('<input type="button" onclick="window.location.href =\'./?action=catalogueEpiNonOuvrier&&id=0\'" class="btn btn-success m-3" value="Catalogue EPI"/> ');
                        }
                    }
                    
                    ?>
                        
                    
                </div>
                <?php
                echo ('<h2 class="home_text" id="compte_a_rebours"></h2>');
            }
        ?>
</div>
</div>