<div class="alert-container">
        <?php 
            if (isset($reussite) && $reussite == true ){
                echo ('<div class="alert alert-success" role="alert">La base de données à été remise à zéro !</div>');
            }elseif (isset($reussite) && $reussite != true){
                echo ('<div class="alert alert-danger"> Erreur lors de l\'éxecution de la requête</div>');
            }
        ?>
    </div>

<div class="btnBdd">
    <button type='submit' name='submit' class='btn btn-success mt-3 mr-1' name="resetBDD" onclick="user_action('resetBDD',this)" >Reset de la base de données</button>
</div>