<?php

class TypeObjet {
    private string $code;
    private string $libelle;

    
    //Constructeur
    function __construct(string $code, string $libelle){
        $this->code = $code;
        $this->libelle = $libelle;
    }   
    
    public function getLibelle(){
        return $this->libelle;
    }
}
