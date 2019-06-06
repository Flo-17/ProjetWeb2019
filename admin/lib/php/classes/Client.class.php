<?php

class Client {

    private $_attributs = array();

    public function __construct(array $data) {
        $this->hydrate($data); //hydrate distribue données aux accesoires
    }

    //hydrate
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
            //on affecte � la cl� sa valeur; le tableau $data est le resultset, tableau associatif
            //$key = nom de champs
        }
    }

    //getters
    public function __get($nom) {
        if (isset($this->_attributs[$nom])) {
            return $this->_attributs[$nom];
        }
    }

    //setters
    public function __set($nom, $valeur) {//$key et $value de hydrate
        $this->_attributs[$nom] = $valeur;    //donne le nom du chmaps et attribue valeur
    }

}
