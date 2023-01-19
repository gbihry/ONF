<?php

/**
 * Description of ModeleTypeObjetDAO
 *
 * @author Ordi-herve
 */
    include_once "$racine/classes/TypeObjet.php";
    require_once("Connexion.php");

class ModeleTypeObjetDAO {
    public static function findById($code){
        try {
            $req = Connexion::getInstance()->prepare("SELECT * FROM typeObjet WHERE code = :code");
            $req->bindValue(':code', $code, PDO::PARAM_STR);
            $req->execute();

            //une seule ligne de résultat traitée comme s'il y en avait plusieurs (pour harmoniser la vue résultat)
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $unTypeObjet = new TypeObjet($ligne['code'], $ligne['libelle']);
            }            
            return $unTypeObjet;

        }
        catch(PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}
