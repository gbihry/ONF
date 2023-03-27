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
            <?php 
                if (isset($verifFile) && $verifFile == true){
                    echo ('<div class="alert alert-success" role="alert">Votre fichier à bien été traité</div>');
                }elseif (isset($verifFile) && $verifFile != true){
                    echo ('<div class="alert alert-danger"> L\' extension de votre fichier n\'est pas un .csv </div>');
                }
                if(isset($verifRole) && $verifRole != true){
                    echo ('<div class="alert alert-danger"> Vous avez essayer d\'ajouter un role supérieur ou égal au votre </div>');
                }
                if(!empty($verifLogin)){
                    if(count($verifLogin) == 1){
                        echo ('<div class="alert alert-danger"> Une email (login) sont déjà enregistrée(s) (ligne : '. $verifLogin[0] .')</div>');
                    }else{
                        echo ('<div class="alert alert-danger"> Les emails (login) sont déjà enregistrée(s) (ligne : ');
                        foreach($verifLogin as $unLogin){
                            echo ($unLogin . ' ');
                        }
                        echo (')</div>');
                    }
                }
                if (isset($verifUser) && $verifUser != true){
                    echo ('<div class="alert alert-danger" role="alert">Un utilisateur à déjà ce login</div>');
                }elseif(isset($verifUser) && $verifUser != false){
                    echo ('<div class="alert alert-success" role="alert">L\'utilisateur à bien été ajouté</div>');
                }

                if (isset($verifChamps) && $verifChamps != true){
                    echo ('<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs</div>');
                }

                if (isset($verifFileIsset) && $verifFileIsset != true){
                    echo ('<div class="alert alert-danger" role="alert">Veuillez choisir un fichier à importer</div>');
                }
                
            ?>
            <form enctype="multipart/form-data" method="post">
                <div class="input-row input_csv">
                    <p>Importer les utilisateurs grâce au csv</p>
                    <div class="input-csv">
                        <a href="docs_utilisation/comment_utiliser_import_csv.docx" download>Aide</a>
                        <a href="exemple.csv" download>Exemple</a>
                        <div>
                            <label for="file" class="custom-file-upload"></label>
                            <input type="file" name="file" id="file" accept=".csv">
                        </div>
                        
                    </div>
                    <button type="submit" id="submit" name="import" value="import" class="btn btn-success m-3">Import</button>

                </div>
            </form>
            <form  method="post">
                <?php if($roleUser != 'Responsable'){ ?>
                    <div class="radio_adduser">
                        <div class="form-check">
                            <input class="form-check-input" id="responsable" onClick="addResponsable()" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Responsable
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="nonResponsable" onClick="addResponsable()" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Non responsable
                            </label>
                        </div>
                    </div>
                <?php } ?>
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
                <div class="input-group mb-3 justify-content-center" id="responsableInput">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Responsable :</span>
                    </div>
                    <select name="responsable" id="selectResponsable" class="custom-select" id="inputGroupSelect01">
                    <?php 
                        if($roleUser == 'Responsable'){
                            echo ("<option value=" . $id ."> ". $nom. "</option>");
                        }else{
                            echo ('<option class="text-center" value="selectionner">--------------Séléctionner--------------</option>');
                            foreach($lesResponsables as $unResponsable){
                                echo ("<option value=" . ($unResponsable['id']).">" . ($unResponsable['nom']). "</option>"); 
                            } 
                        }
                            
                    ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Employeur :</span>
                    </div>
                    <select name="employeur" class="custom-select" id="inputGroupSelect01">
                        <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                    <?php 
                        foreach($lesEmployeur as $unEmployeur){
                            echo ("<option value=" . ($unEmployeur['id']).">" . ($unEmployeur['nom']). " " . ($unEmployeur['prenom']) . " (".$unEmployeur['roleEmployeur'].")</option>");
                        }     
                    ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Role :</span>
                    </div>
                    <select name="role" id="selectRole" class="custom-select" id="inputGroupSelect01">
                        <?php 
                            if ($roleUser != 'Responsable'){
                                echo ('<option class="text-center" value="selectionner">--------------Séléctionner--------------</option>');
                            }
                        ?>
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
                    
                    <?php 
                        if($roleUser == 'Gestionnaire de commande'){ 
                            echo ('<select name="agence" class="custom-select input-select" id="inputGroupSelect01">');
                            echo ('<option class="text-center" value='.$agence.'>'.$agence.'</option>');
                        }else{
                        ?>
                        <select name="agence" class="custom-select" id="inputGroupSelect01">
                        <option class="text-center" value="selectionner">--------------Séléctionner--------------</option>
                        <?php 
                            foreach($lesAgences as $uneAgence){
                                echo ("<option value=" . ($uneAgence)['agence'].">" . ($uneAgence)['agence']. "</option>");
                            } 
                        }
                    ?>
                    </select>
                </div>
            
            
                <button type='submit' name='submit' value="submit" class='btn btn-success m-5'>Confirmer</button>
            </form>
    </div>

</div>