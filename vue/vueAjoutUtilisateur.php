<div class="container-fluid text-center mt-5">
    <h1>Ajout d'un utilisateur</h1>
    <form  method="post">
        <div class="addUser_container">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nom :</span>
                </div>
                <input type="text" placeholder = "Renseigner le nom" class="form-control" name='nom' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="inputGroup-sizing-default">Prenom : </span>
                </div>
                <input type="text"  placeholder ="Reinseigner le prenom"  class="form-control" name='prenom' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Mail : </span>
                </div>
                <input type="text" placeholder="Renseigner le mail" class="form-control" name='mail' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Telephone : </span>
                </div>
                <input type="text" placeholder = "Renseigner le téléphone" class="form-control" name='tel' aria-describedby="inputGroup-sizing-sm" required>
                
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Lieu de livraion :</span>
                </div>
                <select name="livraison" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesLieux as $unLieu){
                        echo ("<option value=" . ($unLieu['id']).">" . ($unLieu['nom']). "</option>");
                    }
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Responsable :</span>
                </div>
                <select name="responsable" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesResponsables as $unResponsable){
                        echo ("<option value=" . ($unResponsable['id']).">" . ($unResponsable['nom']). "</option>");
                    }     
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Employeur onf :</span>
                </div>
                <select name="employeur" class="custom-select" id="inputGroupSelect01">
                    <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesEmployeur as $unEmployeur){
                        if($unEmployeur['roleEmployeur'] == "onf")  
                        echo ("<option value=" . ($unEmployeur['id']).">" . ($unEmployeur['nom']). " " . ($unEmployeur['prenom']) . "</option>");
                    }     
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Employeur syndicat :</span>
                </div>
                <select name="employeur" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesEmployeur as $unEmployeur){
                        if($unEmployeur['roleEmployeur'] == "syndicat")
                        echo ("<option value=" . ($unEmployeur['id']).">" . ($unEmployeur['nom']). " " . ($unEmployeur['prenom']) . "</option>");
                    }     
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Role :</span>
                </div>
                <select name="role" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesRole as $unRole){
                        echo ("<option value=" . ($unRole['id']).">" . ($unRole['libelle']). "</option>");
                    }   
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Metier :</span>
                </div>
                <select name="metier" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesMetier as $unMetier){
                        echo ("<option value=" . ($unMetier['id']).">" . ($unMetier['statut']). "</option>");
                    } 
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Agence :</span>
                </div>
                <select name="agence" class="custom-select" id="inputGroupSelect01">
                <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                <?php 
                    foreach($lesAgences as $uneAgence){
                        echo ("<option value=" . ($uneAgence)['agence'].">" . ($uneAgence)['agence']. "</option>");
                    } 
                    
                ?>
                </select>
            </div>
        </div>
        
        <button type='submit' class='btn btn-success m-5'>Confirmer</button>

            
    </form>

</div>