<?php

class FilmDB extends Film{
	 private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
        public function updateFilm($champ, $nouveau, $id) {

        try {
            // PREPARER LA REQUETE COMME VU PRECEDEMMENT
            $query = "UPDATE film set " . $champ . " = '" . $nouveau . "' where id_film ='" . $id . "'";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    public function getFilm(){
        try{
            $query = "select * from film";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = $data;
            }   
            
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }
   
}

