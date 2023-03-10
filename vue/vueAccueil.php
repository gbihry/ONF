<div class="container text-center">
    <br/>
    <h1>Site d'achat ONF EPI/VET</h1>
    <?php
        if (!isset($_SESSION['autorise'])){
            echo ("<p class='text-muted'>Veuillez vous connecter pour pouvoir utiliser toutes les fonctionnalités</p>");
        }else{
            echo ("<p class='text-muted'>Vous êtes connecté(e)s, vous pouvez désormais utiliser toutes les fonctionnalités</p>");
        }

        echo('<p class="commentaireAccueil">' . ModeleObjetDAO::getIdMessageCommentaire()[1] .'</p>');
    ?>
    <?php
        if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
    ?>
        <input type="button" onclick="window.location.href = './?action=changerCommentaire';" class='btn btn-success m-5' value="Changer commentaire"/> 
    <?php 
        }
    ?>
    <div class="alert-container">
        <?php 
            if (isset($dateCreaFiniEPI) && $dateCreaFiniEPI != false ){
                $date = $dateCreaFiniDate[2] . '/' . $dateCreaFiniDate[1] . '/' . $dateCreaFiniDate[0];
                $time = $dateCreaFiniTime[0] . 'h' . $dateCreaFiniTime[1] . 'm' . $dateCreaFiniTime[2] . 's';
                echo ('<div class="alert alert-success" role="alert">Vous avez fait une commande EPI <br> le '.$date.' à '.$time.'</div>');
            }
        ?>
    </div>
    

    
</div>            
