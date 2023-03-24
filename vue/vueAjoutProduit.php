<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';
}
?>
<div class="container-fluid text-center mt-5">
    <h1>Ajout d'un produit</h1>
    <div class="alert-container">
        <?php 
            if (isset($verifFile) && $verifFile == true ){
                echo ('<div class="alert alert-success" role="alert">Le produit à bien été ajouté</div>');
            }elseif (isset($verifInput) && $verifInput != true){
                echo ('<div class="alert alert-danger"> Veuillez remplir tous les champs</div>');
            }elseif (isset($verifFile) && $verifFile != true){
                echo ('<div class="alert alert-danger"> Votre photo n\'a pas l\'extension correspondante à .png ou .jpg</div>');
            }
            if (isset($verifPhoto) && $verifPhoto != true){
                echo ('<div class="alert alert-danger">La photo existe déjà veuillez choisir un autre nom de photo</div>');
            }
            if (isset($verifType) && $verifType != true){
                echo ('<div class="alert alert-danger">Le type '. $type .' ne vas pas dans le type de produit '. $typeProduit .'</div>');
            }
        ?>
    </div>
    <form  method="post" enctype="multipart/form-data">
        <div class="btnHelp">
            <a href="docs_utilisation/comment_utiliser_ajout_produit.docx" download>Aide</a>
        </div>
        <div class="addUser_container">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nom :</span>
                </div>
                <input type="text" placeholder = "Renseigner le nom" class="form-control" name='nom' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Type :</span>
                </div>
                <select name="type" id="addProduitType" onClick="addProduit()" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                    <option class="text-center" value="EPI">EPI</option>
                    <option class="text-center" value="EPINonOuvrier">EPI non ouvrier</option>
                    <option class="text-center" value="VET">VET</option>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Description : </span>
                </div>
                <textarea  type="text" placeholder="Description ..." class="form-control" name='description' aria-describedby="inputGroup-sizing-sm" required  rows="3"></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Fournisseur :</span>
                </div>
                <select name="fournisseur" id="fournisseurProduit" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesFournisseur as $unFournisseur){
                        echo ("<option id='optionFournisseur' value=" . ($unFournisseur['id']).">" . ($unFournisseur['nom']). "</option>");
                    }
                ?>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Reference :</span>
                </div>
                <input type="text" placeholder = "Renseigner la reference fournisseur" class="form-control" name='reference' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Type produit :</span>
                </div>
                <select name="typeProduit" id="typeProduit" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesType as $unType){
                        echo ("<option id='optionType' value=" . $unType['id'] . ">" . $unType['1']. "</option>");
                    }     
                ?>
                </select>
            </div>
            <div class="taille_box">
                <div class="taille_box_btn" id="taille_box_btn">
                    <div>
                        <select name="taille_blanks_select" id="taille_select">
                            <?php 
                            foreach($lesTailles as $uneTaille){
                                echo ("<option value=" . $uneTaille['id'] . ">" . $uneTaille['libelle']. "</option>");
                            }
                            ?>
                        </select>
                        <a id="taille_add_b_select" class="btn">AJOUTER</a>
                    </div>
                    <div>
                        <input type="text" name="taille_blanks_input" id="taille_input">
                        <a id="taille_add_b_input" class="btn">AJOUTER</a>
                    </div>
                </div>
                <div class="taille_box_table" id="taille_box_table">
                </div>
                <div class="taille_box_inp" id="taille_box_inp">
                </div>
                <script src="js/taille.js"></script>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Prix :</span>
                </div>
                <input type="number" id="addProduitPrix" placeholder = "Renseigner le prix de l'article " class="form-control" name='prix' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Joindre photo :</span>
                </div>
                    <input type="file" name="file" class="form-control" aria-describedby="inputGroup-sizing-sm" required>
            </div>
        <button type='submit' class='btn btn-success m-5'>Confirmer</button>
    </form>
</div>