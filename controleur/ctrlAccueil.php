<?php
include "$racine/vue/vueEntete.php";
if (isset($_SESSION['login'])){
    include "$racine/vue/vueAccueil.php";
}else{
    header("location:./?action=login");
}
// Affichage des vues
include "$racine/vue/vuePied.php";

