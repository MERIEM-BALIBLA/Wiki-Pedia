<?php

namespace App\Model;
use PDO;
use PDOException;

use App\Model\BaseModel;

class TagModel extends BaseModel
{
    private $name;
    // private $description;

    public function index($table, $columns)
    {
        return parent::index($table, $columns);
    }

    public function getTagByName($tagName)
    {
        $sql = "SELECT * FROM tag WHERE name = :tagName";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':tagName', $tagName, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
        {
            try {
                // Utilisez les données passées plutôt qu'un tableau vide
                parent::insert($table, $data);
                
                return true;
            } catch (PDOException $e) {
                // Gérer l'erreur ici si nécessaire (par exemple, journalisation de l'erreur)
                echo "Erreur lors de l'insertion : " . $e->getMessage();
                return false;
            }
        }

    public function update($table,$data,$id)
        {
            // $table = 'categorie';
            try {
                parent::update($table,$data,$id);
                return true;
            } catch(PDOException $e) {
                echo "Erreur lors de l'insertion : " . $e->getMessage();
                return false;
            }
        }

        public function delete($table, $id)
        {
            try {
                parent::delete($table, $id);
                return true;
            } catch (PDOException $e) {
                // Handle or log the exception
                throw new PDOException("Error deleting record: " . $e->getMessage());
            }
        }

        public function deleteall($table)
        {
            try {
                parent::deleteall($table);
                return true;
            } catch (PDOException $e) {
                // Handle or log the exception
                throw new PDOException("Error deleting record: " . $e->getMessage());
            }
        }

          // count 
          public function count(){
            try {
                $query = "SELECT COUNT(*) As TagNumber from tag";
                $statement = $this->db->prepare($query);
                $statement->execute();
                return $statement->fetch(PDO::FETCH_ASSOC)['TagNumber'];
            } catch (PDOException $e) {
                throw $e;
            }
        }

        public function getTag($tag)
        {
            try {
                $query = "SELECT * FROM tag WHERE tag = :tag";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':email', $tag, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Handle the exception, log, or return false
                echo "Error getting data by tag: " . $e->getMessage();
                return false;
            }
        }
        
        public function add(){

        }
}

