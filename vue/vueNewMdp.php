<br/>
<h1 class="text-center">Nouveau Mot de passe</h1>
<br/>

<div class="row">
    <div class="col-4 mx-auto text-center">
        <?php
        if (isset($error)) {
            if($error != "") {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        }
        ?>
        <form action="" method="POST">
            <?php if (!isset($_GET['id'])){?>
                <div class="form-group password">
                    <input type="password" class="form-control" id="mdpActuel" name="mdpActuel" placeholder="Mot de passe actuel" required />
                    <i class="fa-solid fa-eye" onclick="afficherMdp('mdpActuel', 'afficherActuel')" id="afficherActuel"></i><br />
                </div>
            <?php }?>
            <div class="form-group password">
                <input type="password" class="form-control" id="mdpNew" name="mdpNew" placeholder="Nouveau mot de passe" required />
                <i class="fa-solid fa-eye" onclick="afficherMdp('mdpNew', 'afficherNew')" id="afficherNew"></i><br />
            </div>
            <div class="form-group password">
                <input type="password" class="form-control" id="mdpNewConfirm" name="mdpNewConfirm" placeholder="Confirmer nouveau mot de passe" required />
                <i class="fa-solid fa-eye" onclick="afficherMdp('mdpNewConfirm', 'afficherConfirm')" id="afficherConfirm"></i><br />
            </div>
            <input type="submit" name="valider" class="btn btn-success" value="Comfirmer" />
            <br/>
        </form>
        <br/><br/>
    </div>
</div>

<script>
    function afficherMdp(el,aff) {
        var x = document.getElementById(el);
        if (x.type === "password") {
            x.type = "text";
            document.getElementById(aff).className = "fa-solid fa-eye-slash"; 
        } else {
            x.type = "password";
            document.getElementById(aff).className = "fa-solid fa-eye"; 
        }
    }
</script>