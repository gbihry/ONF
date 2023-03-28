    <?php
include "$racine/vue/vueEntete.php";

$dateCreaFiniEPI = ModeleObjetDAO::getDateCommandeFiniEpi(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
$metier = ModeleObjetDAO::getMetierUtilisateur($_SESSION['login'])['idMetier'];
if ($dateCreaFiniEPI != false){
    $dateCreaFiniEPI = explode(' ', $dateCreaFiniEPI);
    $dateCreaFiniDate = explode ('-', $dateCreaFiniEPI[0]);
    $dateCreaFiniTime = explode (':', $dateCreaFiniEPI[1]);
}
include "$racine/vue/vueAccueil.php";

// Affichage des vues
include "$racine/vue/vuePied.php";

