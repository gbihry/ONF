<div class="container-fluid text-center mt-5">
    <h1>Ajout d'un produit</h1>
    <form  method="post">
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
                <select name="type" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                    <option class="text-center" value="EPI">EPI</option>
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
                <select name="fournisseur" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesFournisseur as $unFournisseur){
                        echo ("<option value=" . ($unFournisseur['id']).">" . ($unFournisseur['nom']). "</option>");
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
                    <span class="input-group-text" for="inputGroupSelect01">Type :</span>
                </div>
                <select name="typeProduit" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesType as $unType){
                        echo ("<option value=" . ($unType['id']).">" . ($unType['1']). "</option>");
                    }     
                ?>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Fichier photo :</span>
                </div>
                <input type="text" placeholder = "Renseigner nom de la photo" class="form-control" name='photo' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Prix :</span>
                </div>
                <input type="number" placeholder = "Renseigner le prix de l'article " class="form-control" name='prix' aria-describedby="inputGroup-sizing-sm" required>
            </div>
        <button type='submit' class='btn btn-success m-5'>Confirmer</button>
    </form>

</div>