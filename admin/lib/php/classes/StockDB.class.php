<?php

class StockDB {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }
/*
    public function getClient() {
        try {
            $query = "select * from api_client";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Client($data);
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }
 
 */
    public function updateStock($id_commande){
        //$_db->beginTransaction();     récup bonne syntaxe
        //var_dump($data);
        try{
            $query="update info_produit set stock = stock-1 where idproduit = :id_commande";
            $resultset = $this->_db->prepare($query);           
            $resultset->bindValue(':id_commande', $id_commande);   
            $resultset->execute();
        } catch (PDOException $e) {
            echo 'Echec d\'update'.$e->getMessage();
        }
    }
}
