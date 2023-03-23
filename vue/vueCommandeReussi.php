<div class="container text-center">
    <br/>
    <h1>Commande Validée !</h1>
    <?php 
        echo ('<p data-data="'.$roleUser.'" id="roleVerif" class="text-muted">Vous allez être redirigé vers la page d\'accueil dans <span id="timer">3</span> sec</p>');
    ?>
    
</div>            
<script>
    var timeleft = 2;
    var DTimer = setInterval(function(){
        var role = document.getElementById("roleVerif");
        var roleVerif = role.dataset.data;

        document.getElementById("timer").innerHTML = timeleft;
        timeleft -= 1;
        if(timeleft <= -1){
            clearInterval(DTimer);
            if (roleVerif == 'Responsable'){
                window.location.href = "./?action=commanderPour";
            }else{
                window.location.href = "./?action=historiqueCommande";
            }
        }
    }, 1000);
</script>