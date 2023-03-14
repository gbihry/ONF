<div class="linenav">
    <?php
    if (isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Super-Administrateur' ){
    ?>
    <div class="linenav_item" data-navname="recapCommande">
        <a href="./?action=recapCommande"><i class="fa-solid fa-chart-simple"></i> Récapitulatif </a>
    </div>
    <div class="linenav_item"   data-navname="users">
        <a href="./?action=users"><i class="fa-solid fa-person"></i> Utilisateurs </a>
    </div>
    <div class="linenav_item"   data-navname="produits">
        <a href="./?action=produits"><i class="fa-solid fa-tag"></i> Produits </a>
    </div>
    <div class="linenav_item"   data-navname="aCommander">
        <a href="./?action=aCommander"><i class="fa-solid fa-chart-simple"></i> Commandes </a>
        </div>
        <div class="linenav_item" data-navname="ajoutUtilisateur">
            <a href="./?action=ajoutUtilisateur"><i class="fa-solid fa-user-plus"></i> Add User</a>
        </div>
        <div class="linenav_item" data-navname="ajoutPoint">
            <a href="./?action=ajoutPoint"><i class='fa-solid fa-ticket'></i> Add Point</a>
        </div>
        <div class="linenav_item" data-navname="ajoutProduit">
            <a href="./?action=ajoutProduit"><i class="fa-solid fa-shirt"></i> Add Product</a>
        </div>
        <div class="linenav_item" data-navname="log">
            <a href="./?action=log&&ref=0"><i class="fa-solid fa-book"></i> log</a>
        </div>
        <div class="linenav_item" data-navname="bdd">
            <a href="./?action=bdd"><i class="fa-solid fa-database"></i> Base de donnée</a>
        </div>
        
    <?php
    }
    elseif(isset($_SESSION['autorise']) && ModeleObjetDAO::getRole($_SESSION['login'])['libelle'] == 'Administrateur' ){

        ?>
        <div class="linenav_item" data-navname="recapCommande">
            <a href="./?action=recapCommande"><i class="fa-solid fa-chart-simple"></i> Récapitulatif </a>
        </div>
        <div class="linenav_item"   data-navname="users">
            <a href="./?action=users"><i class="fa-solid fa-person"></i> Utilisateurs </a>
        </div>
        <div class="linenav_item"   data-navname="produits">
            <a href="./?action=produits"><i class="fa-solid fa-tag"></i> Produits </a>
        </div>
        <div class="linenav_item"   data-navname="aCommander">
        <a href="./?action=aCommander"><i class="fa-solid fa-chart-simple"></i> Commandes </a>
        </div>
        <div class="linenav_item" data-navname="ajoutUtilisateur">
            <a href="./?action=ajoutUtilisateur"><i class="fa-solid fa-user-plus"></i> Add User</a>
        </div>
        <div class="linenav_item" data-navname="ajoutPoint">
            <a href="./?action=ajoutPoint"><i class='fa-solid fa-ticket'></i> Add Point</a>
        </div>
        <div class="linenav_item" data-navname="ajoutProduit">
            <a href="./?action=ajoutProduit"><i class="fa-solid fa-shirt"></i> Add Product</a>
        </div>
        <div class="linenav_item" data-navname="commanderPour">
            <a href="./?action=commanderPour"><i class="fa-solid fa-person-circle-plus"></i> Commande Subordonnée</a>
        </div>
        <div class="linenav_item" data-navname="exportCSV">
            <a href="./?action=exportCSV&&ref=0"><i class="fa-solid fa-file-csv"></i> Export CSV</a>
        </div>

    <?php
    }
    else{
    ?>
        <div class="linenav_item"   data-navname="users">
            <a href="./?action=users"><i class="fa-solid fa-person"></i> Utilisateurs </a>
        </div>
        <div class="linenav_item" data-navname="commanderPour">
            <a href="./?action=commanderPour"><i class="fa-solid fa-person-circle-plus"></i> Commande Subordonnée</a>
        </div>
        <div class="linenav_item" data-navname="ajoutUtilisateur">
            <a href="./?action=ajoutUtilisateur"><i class="fa-solid fa-user-plus"></i> Add User</a>
        </div>
        <div class="linenav_item"   data-navname="stat">
        <a href="./?action=aCommander"><i class="fa-solid fa-chart-simple"></i> Commandes </a>
        </div>

    <?php } ?>
</div>