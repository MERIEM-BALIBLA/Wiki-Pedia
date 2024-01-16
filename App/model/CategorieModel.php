<?php

namespace App\Model;
use PDOException;
use PDO;

use App\Model\BaseModel;

class CategorieModel extends BaseModel
{
    private $name;
    private $description;

    public function index($table, $columns)
    {
        return parent::index($table, $columns);
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

        public function readcategorie(){
            try {
                $query = "
                            SELECT 
                                * FROM categorie
                                ORDER BY id DESC
                                LIMIT 5;
                            ";
                $statement = $this->db->prepare($query);
                $statement->execute();
    
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw $e;
            }
        }

        // count 
        public function count(){
            try {
                $query = "SELECT COUNT(*) As CatNumber from categorie";
                $statement = $this->db->prepare($query);
                $statement->execute();
                return $statement->fetch(PDO::FETCH_ASSOC)['CatNumber'];
            } catch (PDOException $e) {
                throw $e;
            }
        }

        public function ArtCount(){
                // try {
                //     //  affichage 
                //     $query =  "SELECT categorie.name as category_name, article.name as article_name
                //     FROM categorie
                //     LEFT JOIN article ON article.categorie_id = categorie.id";

                //     $statement = $this->db->prepare($query);
                //     $statement->execute();
                //     return $statement->fetchAll(PDO::FETCH_ASSOC);
                // } catch (PDOException $e) {
                //     throw $e;
                // }    
                try {
                    $query = "SELECT 
                                categorie.name as category_name, 
                                COUNT(article.id) as article_count,
                                GROUP_CONCAT(article.name) as article_list
                              FROM categorie
                              LEFT JOIN article ON article.categorie_id = categorie.id
                              GROUP BY categorie.id";
                    
                    // afficher le nombre total

                    // $query = "SELECT 
                    //                 categorie.name as category_name, 
                    //                 COUNT(article.id) as article_count
                    //             FROM categorie
                    //             LEFT JOIN article ON article.categorie_id = categorie.id
                    //             GROUP BY categorie.id";

                    $statement = $this->db->prepare($query);
                    $statement->execute();
                    return $statement->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    throw $e;
                }                          
        }
}

