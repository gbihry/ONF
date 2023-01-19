<?php

class Objet {
    //Les attributs privés
    private string $numero;
    private string $nomCommun;
    private string $constellation;
    private string $periodeVisibilite;
    private string $diametreApparent;
    private string $magnitude;
    private TypeObjet $typeObjet;

    //Constructeur
    public function __construct(string $num, string $nom, string $const, string $per, string $diam, string $magn,TypeObjet $type){
        $this->numero = $num;
        $this->nomCommun = $nom;
        $this->constellation = $const;
        $this->periodeVisibilite = $per;
        $this->diametreApparent = $diam;
        $this->magnitude = $magn;
        $this->typeObjet = $type;
    }
    
    public function getNumero(){
        return $this->numero;
    }
    
    public function getNomCommun(){
        return $this->nomCommun;
    }    
    
    public function getTypeObjet(){
        return $this->typeObjet;
    }      
    
    public function getConstellation(){
        return $this->constellation;
    }

    public function getPeriodeVisibilite(){
        return $this->periodeVisibilite;
    }

    public function getDiametreApparent(){
        return $this->diametreApparent;
    }

    public function getMagnitude(){
        return $this->magnitude;
    }
}
