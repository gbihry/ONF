<div class="container text-center">
    <br/>
    <h1>Découvrez ONF</h1>
    <?php
        if (!isset($_SESSION['autorise'])){
            echo ("<p class='text-muted'>Veuillez vous connecter pour pouvoir utiliser toutes les fonctionnalités</p>");
        }else{
            echo ("<p class='text-muted'>Vous êtes connecté(e)s, vous pouvez désormais utiliser toutes les fonctionnalités</p>");
        }

        echo(ModeleObjetDAO::getIdMessageCommentaire()[1]);
    ?>
    <?php
        if(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur'){
    ?>
        <input type="button" onclick="window.location.href = './?action=changerCommentaire';" class='btn btn-success m-5' value="Changer commentaire"/> 
    <?php 
        }
    ?>

    

    
</div>            
