<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';
}
?>


    <div class="alert-container">
        <?php 
            if (isset($verifInput) && $verifInput == true ){
                echo ('<div class="alert alert-success" role="alert">Votre fichier à bien été exporté</div>');
            }elseif (isset($verifInput) && $verifInput != true){
                echo ('<div class="alert alert-danger"> Vous n\'avez pas rempli tous les champs </div>');
            }
        ?>
    </div>
    <?php if(isset($lesLieuLivraison)) {?>
    <div class="export">
        <h1>Saisissez le lieu de livraison et le type de la commande</h1>
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
    <?php }  ?>
</div>

<?php if(isset($lesFournisseur)) {?>
    <div class="export">
        <h1>Saisissez le fournisseur et le type de la commande</h1>
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
                    <span class="input-group-text" for="inputGroupSelect01">Fournisseur :</span>
                </div>
                <select name="fournisseur" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesFournisseur as $unFournisseur){
                        echo ("<option value=" . ($unFournisseur)['id'].">" . ($unFournisseur)['nom']. "</option>");
                    } 
                ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success" >export csv</button>
    </form>
    <?php }  ?>


    <?php if(isset($test)) {?>
    <div class="export"> 
        <h1>Saisissez le fournisseur, le lieu de livraison et le type de la commande</h1>
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
                    <span class="input-group-text" for="inputGroupSelect01">Fournisseur :</span>
                </div>
                <select name="fournisseur" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($Fournisseur as $unFournisseur){
                        echo ("<option value=" . ($unFournisseur)['id'].">" . ($unFournisseur)['nom']. "</option>");
                    } 
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">lieu de livraion  :</span>
                </div>
                <select name="lieuLivraison" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($LieuLivraison as $unLieuLivraison){
                        echo ("<option value=" . ($unLieuLivraison)['id'].">" . ($unLieuLivraison)['nom']. "</option>");
                    } 
                ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success" >export csv</button>
    </form>
    <?php }  ?>

    <div class="btnExportCsv">
        <button type='submit' name='submit' class='btn btn-success mt-3 mr-1' onclick="window.location.href = './?action=exportCSV&&ref=1';" >Par lieu livraison</button>
        <button type='submit' name='submit' class='btn btn-success mt-3' onclick="window.location.href = './?action=exportCSV&&ref=2';" >Par fournisseur</button>
        <button type='submit' name='submit' class='btn btn-success mt-3' onclick="window.location.href = './?action=exportCSV&&ref=3';" >Par fournisseur et par lieu</button>
    </div>
