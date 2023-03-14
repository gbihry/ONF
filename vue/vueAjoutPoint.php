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
    <h1>Ajout point a un utilisateur</h1>
    <form  method="post">
        <div class="addUser_container">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" for="inputGroupSelect01">Utilisateur :</span>
                </div>
                <select name="user" class="custom-select" id="inputGroupSelect01">
                <?php 
                    foreach($AllUsers as $user){
                        $roleUser = ModeleObjetDAO::getRole($user['login']);
                        foreach ($roleAcess as $unRole){
                            if ($unRole['libelle'] == $roleUser['libelle']){
                                $points = ModeleObjetDAO::getNbrPointUtilisateur($user['id'])['point'];
                                echo ("<option value=" . ($user['id']).">" . ($user['login']). " (" . $points . ") " . "</option>");
                            }
                        }
                    }     
                ?>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Point :</span>
                </div>
                <input type="number" class="form-control" name='nombrepoint' aria-describedby="inputGroup-sizing-sm" required>
            </div>
        </div>
        
        <button type='submit' class='btn btn-success m-5'>Confirmer</button>

            
    </form>

</div>