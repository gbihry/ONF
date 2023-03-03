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
    <h1>Ajout d'un utilisateur</h1>
    
        <div class="addUser_container">
        <form enctype="multipart/form-data" method="post">
            <div class="input-row input_csv">
                <p>Importer les utilisateurs grâce au csv</p>
                <label for="file" class="custom-file-upload"></label>
                <input type="file" name="file" id="file" accept=".csv">
                <br />
                <button type="submit" id="submit" name="import" value="import" class="btn btn-success m-3">Import</button>
                <br />
                <br />
                <br />
            </div>
        </form>
            <form  method="post">
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
                <div class="input-group mb-3 justify-content-center">
                    <?php 
                        if(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] != 'Responsable'){
                            ?><p id="messageCreateResponsable">Ne modifier pas ce champ si le role est responsable <i class="fa-solid fa-arrow-down"></i></p> <?php
                        }
                    ?>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Responsable :</span>
                    </div>
                    <select name="responsable" class="custom-select" id="inputGroupSelect01">
                        <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                    <?php 
                        if(ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Responsable'){
                            echo ("<option value=" . $id ."> ". $nom. "</option>");
                        }else{
                            foreach($lesResponsables as $unResponsable){
                                echo ("<option value=" . ($unResponsable['id']).">" . ($unResponsable['nom']). "</option>"); 
                            } 
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
                        foreach($lesLibelles as $unLibelle){
                            echo ("<option value=" . ($unLibelle['id']).">" . ($unLibelle['libelle']). "</option>");
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
            
            
                <button type='submit' name='submit' value="submit" class='btn btn-success m-5'>Confirmer</button>
            </form>
    </div>

</div>