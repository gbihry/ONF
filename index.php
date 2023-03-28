<?php
    //Permet de connaitre la racine du projet
    $racine = dirname(__FILE__);
    define('RACINE', $racine);
    //inclure le routeur
    include "$racine/route/Routeur.php";

    //Récupération de l'action à exécuter dans l'URL en méthode GET
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!isset($action)){
        $action = "defaut";
    }

    //Appel au routeur pour récupérer le controleur à appeler
    Routeur::getControleur($action);