<div class="container text-center">
    <br/>
    <h1>Commande Validée !</h1>
    <p class='text-muted'>Vous allez être redirigé vers la page d'accueil dans <span id="timer">3</span> sec</p>
</div>            
<script>
    var timeleft = 2;
    var DTimer = setInterval(function(){
    document.getElementById("timer").innerHTML = timeleft;
    timeleft -= 1;
    if(timeleft <= -1){
        clearInterval(DTimer);
        window.location.href = "./?action=historiqueCommande";
    }
    }, 1000);
</script>