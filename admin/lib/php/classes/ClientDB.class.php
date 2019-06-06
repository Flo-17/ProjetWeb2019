<?php
class ClientDB extends Client {
    private $_db;
    private $_array = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getClient($email,$password){
        $query="select * from client where email_client=:email1 and password_client=:password";
        try {
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(':email',$email, PDO::PARAM_STR);
        $resultset->bindValue(':password',$password, PDO::PARAM_STR);

        $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
          // nous n'employerons pas d'objet, afin de faciliter la conversion en Json dans le 
          //fichier ajax ajaxRechercheClient.php
                $_array[] = $data;               
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_array;
    }
           
    public function addClient(array $data) {
        $query = "select ajouter_client(:nom,:prenom,:cp,:localite,:rue,:num,:tel,:email1,:password) as retour";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);   
            $resultset->bindValue(':prenom', $data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':cp', $data['cp'], PDO::PARAM_STR);              
            $resultset->bindValue(':localite', $data['localite'], PDO::PARAM_STR);
            $resultset->bindValue(':rue', $data['rue'], PDO::PARAM_STR);
            $resultset->bindValue(':num', $data['num'], PDO::PARAM_STR);  
            $resultset->bindValue(':tel', $data['tel'], PDO::PARAM_STR); 
            $resultset->bindValue(':email1', $data['email1'], PDO::PARAM_STR);  
            $resultset->bindValue(':password', $data['password'], PDO::PARAM_STR); 
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            
            return $retour;
        }catch(PDOException $e){
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
        
    }
}