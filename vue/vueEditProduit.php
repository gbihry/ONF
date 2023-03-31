<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    location.href = "./?action=editProduit&id='.$_GET['id'].'";
    </script>';
}
echo ('<a href="./?action=catalogueEpi&&id=0" class="returnarrow"><i class="fa-solid fa-arrow-left"></i><p>Retour</p></a>');
?>
<div class="container-fluid text-center mt-5">
    <h1>Modifier un produit</h1>
    <div class="alert-container">
        <?php 
            if ($dateAuj > $dateFin || (isset($verifLigneCommande) && $verifLigneCommande == false)){
                echo "
                <div class='btnHelp'>
                    <a href='' class='red' id='supressproduct'>Supprimer le produit</a>
                    <a href='docs_utilisation/comment_utiliser_modifier_produit.docx' download>Aide</a>
                </div>";
            }else{
                echo "<div class='btnHelp'><a href='docs_utilisation/comment_utiliser_modifier_produit.docx' download>Aide</a></div>";
            }
            
            if (isset($verifFile) && $verifFile == true ){
                echo ('<div class="alert alert-success" role="alert">Le produit à bien été ajouté</div>');
            }elseif (isset($verifInput) && $verifInput != true){
                echo ('<div class="alert alert-danger"> Veuillez remplir tous les champs</div>');
            }elseif (isset($verifFile) && $verifFile != true){
                echo ('<div class="alert alert-danger"> Votre photo n\'a pas l\'extension correspondante à .png ou .jpg</div>');
            }elseif (isset($verifPhoto) && $verifPhoto != true){
                echo ('<div class="alert alert-danger">La photo existe déjà veuillez choisir un autre nom de photo</div>');
            }
            if(isset($newImage)) {
                if (file_exists("images/produits/".($newImage))){
                    echo "<img class='img-produit-edit' src='images/produits/".($newImage)."'>";
                    echo "<div class='btnDownload'><a href='' id='supressimgbtn'>Supprimer la photo</a></div>";
                }else{
                    echo "<img class='img-produit-edit' src='images/error.png'>";
                }
            }else {
                if (file_exists("images/produits/".($infoProduct['fichierPhoto']))){
                    echo "<img class='img-produit-edit' src='images/produits/".($infoProduct['fichierPhoto'])."'>";
                    echo "<div class='btnDownload'><a href='' id='supressimgbtn'>Supprimer la photo</a></div>";
                }else{
                    echo "<img class='img-produit-edit' src='images/error.png'>";
                }
            }
        
        ?>
    </div>
    <form  method="post" enctype="multipart/form-data">
    

        <div class="btnHelp">
            
        </div>
        <div class="addUser_container">
            <div class="radio-visible">
                <div class="form-check">
                    <?php 
                        if ($infoProduct['visible'] == 1){
                            echo ('<input class="form-check-input" type="radio" name="produitVisible" id="flexRadioDefault1" value="1" checked>');
                        }else{
                            echo ('<input class="form-check-input" type="radio" name="produitVisible" id="flexRadioDefault1" value="1">');
                        }
                    ?>
                    <label class="form-check-label" for="produitVisible">
                        Produit visible
                    </label>
                </div>
                <div class="form-check">
                    <?php 
                        if ($infoProduct['visible'] == 0){
                            echo ('<input class="form-check-input" type="radio" name="produitVisible" id="flexRadioDefault2" value="0" checked>');
                        }else{
                            echo ('<input class="form-check-input" type="radio" name="produitVisible" id="flexRadioDefault2" value="0">');
                        }
                    ?>
                    <label class="form-check-label" for="produitNonVisible">
                        Produit non visible
                    </label>
                </div>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nom :</span>
                </div>
                <input type="text" placeholder = "Renseigner le nom" class="form-control" name='nom' aria-describedby="inputGroup-sizing-sm" required value="<?= $infoProduct['nom'] ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Type :</span>
                </div>
                <select name="type" id="addProduitType" onClick="addProduit()" class="custom-select" id="inputGroupSelect01">
                    <?php 
                        foreach($lesTypeProduits as $unTypeProduit){
                            if($unTypeProduit == $infoProduct['type'])  {
                                echo ("<option selected value=" . ($unTypeProduit).">" . ($unTypeProduit). "</option>");
                            } else {
                                echo ("<option value=" . ($unTypeProduit).">" . ($unTypeProduit). "</option>");
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Description : </span>
                </div>
                <textarea  type="text" placeholder="Description ..." class="form-control" name='description' aria-describedby="inputGroup-sizing-sm" required  rows="3" ><?= $infoProduct['description'] ?></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Fournisseur :</span>
                </div>
                <select name="fournisseur" id="fournisseurProduit" class="custom-select" id="inputGroupSelect01">
                    <?php 
                        foreach($lesFournisseur as $unFournisseur){
                            if($unFournisseur['id'] == $infoProduct['idFournisseur'])  {
                                echo ("<option selected value=" . ($unFournisseur['id']).">" . ($unFournisseur['nom']). "</option>");
                            } else {
                                echo ("<option value=" . ($unFournisseur['id']).">" . ($unFournisseur['nom']). "</option>");
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Reference :</span>
                </div>
                <input type="text" placeholder = "Renseigner la reference fournisseur" class="form-control" name='reference' aria-describedby="inputGroup-sizing-sm" required value="<?= $infoProduct['referenceFournisseur'] ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Type produit :</span>
                </div>
                <select name="typeProduit" id="typeProduit" class="custom-select" id="inputGroupSelect01">
                    <?php 
                        foreach($lesType as $unType){
                            if($unType['id'] == $infoProduct['idType'])  {
                                echo ("<option selected value=" . ($unType['id']).">" . ($unType['libelle']). "</option>");
                            } else {
                                echo ("<option value=" . ($unType['id']).">" . ($unType['libelle']). "</option>");
                            }
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
            <script id="TailleInit">
                var Tailles = <?= json_encode($lesTaillesProduit) ?>;
                for(var i = 0; i < Tailles.length; i++){
                    Taille(Tailles[i].id, Tailles[i].libelle);
                }
                document.getElementById("TailleInit").remove();
            </script>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Prix :</span>
                </div>
                <input type="number" id="addProduitPrix" placeholder = "Renseigner le prix de l'article " class="form-control" name='prix' aria-describedby="inputGroup-sizing-sm" required value="<?= $infoProduct['prix'] ?>">
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Joindre photo :</span>
                </div>
                    <input type="file" name="file" class="form-control" aria-describedby="inputGroup-sizing-sm">
            </div>
        <button type='submit' class='btn btn-success m-5'>Confirmer</button>
    </form>
</div>