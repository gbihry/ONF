<div class="container-fluid text-center mt-5">
    <h1>Ajout d'un utilisateur</h1>
    <form  method="post">
        <div class="addUser_container">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Login :</span>
                </div>
                <input type="text" class="form-control" name='login' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nom :</span>
                </div>
                <input type="text" class="form-control" name='nom' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Prenom : </span>
                </div>
                <input type="text" class="form-control" name='prenom' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Mail : </span>
                </div>
                <input type="text" class="form-control" name='mail' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Telephone : </span>
                </div>
                <input type="text" class="form-control" name='tel' aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Lieu de livraion :</span>
                </div>
                <select name="livraison" class="custom-select" id="inputGroupSelect01">
                <?php 
                    foreach($lesLieux as $unLieu){
                        echo ("<option value=" . ($unLieu['id']).">" . ($unLieu['nom']). "</option>");
                    }
                        
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Chef :</span>
                </div>
                <select name="chef" class="custom-select" id="inputGroupSelect01">
                <?php 
                    foreach($lesChef as $unChef){
                        echo ("<option value=" . ($unChef['id']).">" . ($unChef['nom']). "</option>");
                    }     
                ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Role :</span>
                </div>
                <select name="role" class="custom-select" id="inputGroupSelect01">
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
                <?php 
                    foreach($lesMetier as $unMetier){
                        echo ("<option value=" . ($unMetier['id']).">" . ($unMetier['statut']). "</option>");
                    } 
                ?>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Agence : </span>
                </div>
                <input type="text" class="form-control" name='agence' aria-describedby="inputGroup-sizing-sm" required>
            </div>
        </div>
        
        <button type='submit' class='btn btn-outline-success m-5'>Confirmer</button>

            
    </form>

</div>