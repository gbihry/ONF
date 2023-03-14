<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';
}
?>

<div class="export">
    <h1>Saisissez le lieu de livraison et le type de la commande</h1>
    <div class="alert-container">
        <?php 
            if (isset($verifInput) && $verifInput == true ){
                echo ('<div class="alert alert-success" role="alert">Votre fichier à bien été exporté</div>');
            }elseif (isset($verifInput) && $verifInput != true){
                echo ('<div class="alert alert-danger"> Vous n\'avez pas rempli tous les champs </div>');
            }
        ?>
    </div>
    <form action="" method="post">
        <div class="input">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Type de commande :</span>
                </div>
                <select name="type" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <option value="VET">Commande VET</option>
                <option value="EPI">Commande EPI</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">lieu de livraion :</span>
                </div>
                <select name="lieuLivraison" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesLieuLivraison as $unLieuLivraison){
                        echo ("<option value=" . ($unLieuLivraison)['id'].">" . ($unLieuLivraison)['nom']. "</option>");
                    } 
                ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success" >export csv</button>
    </form>
</div>