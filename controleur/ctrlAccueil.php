    <?php
include "$racine/vue/vueEntete.php";
if (isset($_SESSION['login'])){
    $dateCreaFiniEPI = ModeleObjetDAO::getDateCommandeFiniEpi(ModeleObjetDAO::getIdUtilisateur($_SESSION['login'])['id']);
    if ($dateCreaFiniEPI != false){
        $dateCreaFiniEPI = explode(' ', $dateCreaFiniEPI);
        $dateCreaFiniDate = explode ('-', $dateCreaFiniEPI[0]);
        $dateCreaFiniTime = explode (':', $dateCreaFiniEPI[1]);
    }
    include "$racine/vue/vueAccueil.php";
}else{
    header("location:./?action=login");
}
// Affichage des vues
include "$racine/vue/vuePied.php";

