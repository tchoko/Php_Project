<?php

class Vue_film_genreDB {
	 private $_db;
    private $_array = array();
    
    public function __construct($db){//contenu de $cnx (index)
        $this->_db = $db;
    }
    
	 public function getFilmsByGenre($id_genre) {
        print 'coucou';
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_film_genre where ref=:id_genre";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_genre', $id_genre);
            $resultset->execute();
            $this->_db->commit();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
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
	
    public function getAllFilms(){
        try{
            $query = "select * from vue_film_genre";
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

