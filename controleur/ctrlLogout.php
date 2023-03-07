<?php
session_start();
include_once "$racine/modele/ModeleObjetDAO.php";

date_default_timezone_set('Europe/Paris');

$id = ModeleObjetDAO::getIdUtilisateur($_SESSION['login']);
$description = "Déconnexion de ".$_SESSION['login'];
$date = date( "Y-m-d H:i:s");
ModeleObjetDAO::insertLog($date,$description,$id);
session_destroy();

header("location:index.php");

