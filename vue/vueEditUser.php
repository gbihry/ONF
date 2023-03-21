<?php
if(isset($reload) && $reload == true) {
    echo '<script>
    if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    location.href = "./?action=editUser&id='.$_GET['id'].'";
    </script>';
}
?>
<div class="container-fluid text-center mt-5">
    <h1>Modification d'un utilisateur</h1>
    
        <div class="addUser_container">
            <?php 
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
                
            ?>
            <form  method="post">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nom :</span>
                    </div>
                    <input type="text" placeholder = "Renseigner le nom" class="form-control" name='nom' aria-describedby="inputGroup-sizing-sm" required value="<?= $AllUser['nom'] ?>">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  id="inputGroup-sizing-default">Prenom : </span>
                    </div>
                    <input type="text"  placeholder ="Reinseigner le prenom"  class="form-control" name='prenom' aria-describedby="inputGroup-sizing-sm" required value="<?= $AllUser['prenom'] ?>">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Mail : </span>
                    </div>
                    <input type="text" placeholder="Renseigner le mail" class="form-control" name='mail' aria-describedby="inputGroup-sizing-sm" required value="<?= $AllUser['email'] ?>">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Telephone : </span>
                    </div>
                    <input type="text" placeholder = "Renseigner le téléphone" class="form-control" name='tel' aria-describedby="inputGroup-sizing-sm" required value="<?= $AllUser['tel'] ?>">
                    
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Lieu de livraion :</span>
                    </div>
                    <?php
                        if ($dateCreaFiniEPI != null && $dateCreaFiniVET != null){
                            echo '<select name="livraison" class="custom-select input-select" id="inputGroupSelect01">';
                        }else{
                            echo '<select name="livraison" class="custom-select" id="inputGroupSelect01">';
                        }
                    ?>
                    
                    <?php 
                        foreach($lesLieux as $unLieu){
                            if($unLieu['id'] == $AllUser['idLieuLivraison'])  {
                                echo ("<option selected value=" . ($unLieu['id']).">" . ($unLieu['nom']). "</option>");
                            } else {
                                echo ("<option value=" . ($unLieu['id']).">" . ($unLieu['nom']). "</option>");
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
                    <?php 
                        foreach($lesEmployeur as $unEmployeur){
                            if($AllUser['IdEmployeur'] == $unEmployeur['id']) {
                                echo ("<option selected value=" . ($unEmployeur['id']).">" . ($unEmployeur['nom']). " " . ($unEmployeur['prenom']) . " (".$unEmployeur['roleEmployeur'].")</option>");
                            } else {
                                echo ("<option value=" . ($unEmployeur['id']).">" . ($unEmployeur['nom']). " " . ($unEmployeur['prenom']) . " (".$unEmployeur['roleEmployeur'].")</option>");
                            }
                    }     
                    ?>
                    </select>
                </div>
                <div class="input-group mb-3 justify-content-center" id="responsableInput">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Responsable :</span>
                    </div>
                    <?php
                        if ($dateCreaFiniEPI != null && $dateCreaFiniVET != null){
                            echo '<select name="responsable" id="selectResponsable" class="custom-select input-select" id="inputGroupSelect01">';
                        }else{
                            echo '<select name="responsable" class="custom-select" id="inputGroupSelect01">';
                        }
                    ?>
                    <?php
                        if($AllUser['id_responsable'] != $AllUser['id']) {
                            echo ("<option class='text-center' value='".$AllUser['id']."'>Est Responsable</option>");
                        }
                        foreach($lesResponsables as $unResponsable) {
                            if($unResponsable['id'] == $AllUser['id_responsable']) {
                                echo ("<option selected value=" . ($unResponsable['id']).">" . ($unResponsable['nom']). "</option>");
                            } else {
                                echo ("<option value=" . ($unResponsable['id']).">" . ($unResponsable['nom']). "</option>");
                            }
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
                        foreach($lesLibelles as $unLibelle){
                            if($unLibelle['id'] == $AllUser['idRole']) {    
                                echo ("<option selected value=" . ($unLibelle['id']).">" . ($unLibelle['libelle']). "</option>");
                            } else {
                                echo ("<option value=" . ($unLibelle['id']).">" . ($unLibelle['libelle']). "</option>");
                            }
                        }   
                    ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Metier :</span>
                    </div>
                    <select name="metier" class="custom-select" id="inputGroupSelect01">
                    <?php 
                        foreach($lesMetier as $unMetier){
                            if($unMetier['id'] == $AllUser['idMetier']) {
                                echo ("<option selected value=" . ($unMetier['id']).">" . ($unMetier['statut']). "</option>");
                            } else {
                                echo ("<option value=" . ($unMetier['id']).">" . ($unMetier['statut']). "</option>");
                            }
                        } 
                    ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="inputGroupSelect01">Agence :</span>
                    </div>
                    <?php 
                        if ($dateCreaFiniEPI != null && $dateCreaFiniVET != null){
                            echo '<select name="agence" class="custom-select input-select" id="inputGroupSelect01">';
                        }else{
                            echo '<select name="agence" class="custom-select" id="inputGroupSelect01">';
                        }
                    ?>
                    <?php 
                        foreach($lesAgences as $uneAgence){
                            if($uneAgence['agence'] == $AllUser['agence']) {
                                echo ("<option selected value=" . ($uneAgence)['agence'].">" . ($uneAgence)['agence']. "</option>");
                            } else {
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