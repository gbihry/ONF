<div class="linenav">
    <div class="linenav_item" data-navname="stat">
        <a href="#"><i class="fa-solid fa-chart-simple"></i> Statistique</a>
    </div>
    <div class="linenav_item" data-navname="ajoutUtilisateur">
        <a href="./?action=ajoutUtilisateur"><i class="fa-solid fa-user-plus"></i> Add User</a>
    </div>
</div>
<script>
    urlp = new URLSearchParams(window.location.search); // on récupère l'url de la page
    if (urlp.has('action')) { // si l'url contient l'attribut action
        var action = urlp.get('action'); // on récupère la valeur de l'attribut action
        var nav = document.querySelector('[data-navname="' + action + '"]'); // on récupère l'élément qui a l'attribut data-navname = action
        nav ? nav.classList.add('toggle') : null; // si nav existe, on ajoute la classe toggle
    }
</script>