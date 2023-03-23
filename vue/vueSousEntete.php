<div class="linenav">
    <?php
    if (isset($_SESSION['autorise']) && $roleUser == 'Administrateur' ){
    ?>
    <div class="linenav_item" data-navname="recapCommande">
        <a href="./?action=recapCommande"><i class="fa-solid fa-chart-simple"></i> Récapitulatif </a>
    </div>
    <div class="linenav_item"   data-navname="users">
        <a href="./?action=users"><i class="fa-solid fa-person"></i> Utilisateurs </a>
    </div>
    <div class="linenav_item"   data-navname="aCommander">
        <a href="./?action=aCommander"><i class="fa-solid fa-chart-simple"></i> Commandes </a>
        </div>
        <div class="linenav_item" data-navname="ajoutUtilisateur">
            <a href="./?action=ajoutUtilisateur"><i class="fa-solid fa-user-plus"></i> Ajouter Utilisateurs</a>
        </div>
        <div class="linenav_item" data-navname="ajoutPoint">
            <a href="./?action=ajoutPoint"><i class='fa-solid fa-ticket'></i> Ajouter Points</a>
        </div>
        <div class="linenav_item" data-navname="ajoutProduit">
            <a href="./?action=ajoutProduit"><i class="fa-solid fa-shirt"></i> Ajouter Produit</a>
        </div>
        <div class="linenav_item" data-navname="log">
            <a href="./?action=log&&ref=0"><i class="fa-solid fa-book"></i> log</a>
        </div>
        <div class="linenav_item" data-navname="bdd">
            <a href="./?action=bdd"><i class="fa-solid fa-database"></i> Base de donnée</a>
        </div>
        
    <?php
    }
    elseif(isset($_SESSION['autorise']) && $roleUser == 'Gestionnaire de commande' ){

        ?>
        <div class="linenav_item" data-navname="recapCommande">
            <a href="./?action=recapCommande"><i class="fa-solid fa-chart-simple"></i> Récapitulatif </a>
        </div>
        <div class="linenav_item"   data-navname="users">
            <a href="./?action=users"><i class="fa-solid fa-person"></i> Utilisateurs </a>
        </div>
        <div class="linenav_item"   data-navname="aCommander">
        <a href="./?action=aCommander"><i class="fa-solid fa-chart-simple"></i> Commandes </a>
        </div>
        <div class="linenav_item" data-navname="ajoutUtilisateur">
            <a href="./?action=ajoutUtilisateur"><i class="fa-solid fa-user-plus"></i> Ajouter Utilisateurs</a>
        </div>
        <div class="linenav_item" data-navname="ajoutPoint">
            <a href="./?action=ajoutPoint"><i class='fa-solid fa-ticket'></i> Ajouter Points</a>
        </div>
        <div class="linenav_item" data-navname="ajoutProduit">
            <a href="./?action=ajoutProduit"><i class="fa-solid fa-shirt"></i> Ajouter Produit</a>
        </div>
        <div class="linenav_item" data-navname="exportCSV">
            <a href="./?action=exportCSV&&ref=0"><i class="fa-solid fa-file-csv"></i> Exporter un CSV</a>
        </div>

    <?php
    }
    else{
    ?>
        <div class="linenav_item"   data-navname="users">
            <?php 
                if ($roleUser == 'Responsable'){
                    echo ('<a href="./?action=users"><i class="fa-solid fa-person"></i> Équipe </a>');
                }else{
                    echo ('<a href="./?action=users"><i class="fa-solid fa-person"></i> Utilisateurs </a>');
                }
            ?>
        </div>
        <div class="linenav_item" data-navname="commanderPour">
            <a href="./?action=commanderPour"><i class="fa-solid fa-person-circle-plus"></i> Commande Subordonnée</a>
        </div>
        <div class="linenav_item" data-navname="ajoutUtilisateur">
            <a href="./?action=ajoutUtilisateur"><i class="fa-solid fa-user-plus"></i> Ajouter Utilisateurs</a>
        </div>
        <div class="linenav_item"   data-navname="stat">
        <a href="./?action=aCommander"><i class="fa-solid fa-chart-simple"></i> Commandes </a>
        </div>

    <?php } ?>
</div>