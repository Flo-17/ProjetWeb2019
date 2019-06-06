<?php

class ProduitDB {
    private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    public function updateProduit($champ,$nouveau,$id){        
        
        try {
            $query="UPDATE info_produit set ".$champ." = '".$nouveau."' where idproduit ='".$id."'";            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
}
