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

//         public function updateTag($data, $id)
// {
//     try {
//         parent::update('pivot', ['tag_id' => $data['tag']], ['article_id' => $id]);
//         return true;
//     } catch (PDOException $e) {
//         error_log("Error updating tag record: " . $e->getMessage());
//         return false;
//     }
// }


}

