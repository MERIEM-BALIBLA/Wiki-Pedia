<?php

namespace App\Model;
use PDOException;
use PDO;

use App\Model\BaseModel;

class ArticleModel extends BaseModel
{
    private $name;
    private $description;


    public function readwiki()
        {
            try {
                $query = "
                    SELECT 
                    article.*, 
                    categorie.name AS categorie_name,
                    user.name AS user_name,
                    tag.name AS tag_name
                    FROM pivot
                    LEFT JOIN article ON article.id = pivot.article_id
                    LEFT JOIN categorie ON article.categorie_id = categorie.id
                    LEFT JOIN user ON article.user_id = user.id
                    LEFT JOIN tag ON pivot.tag_id = tag.id
                    WHERE user.id = :user_id
                ";
        
                $statement = $this->db->prepare($query);
                $statement->bindParam(':user_id', $_SESSION['user_id'], \PDO::PARAM_INT);
                $statement->execute();
        
                return $statement->fetchAll(\PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Handle the exception (log it, display an error message, etc.)
                // For simplicity, just rethrow the exception for now
                throw $e;
            }
        }

        public function wikiInfo($article_id)
        {
            try {
                $query = "
                    SELECT 
                    article.*, 
                    categorie.name AS categorie_name,
                    user.name AS user_name,
                    tag.name AS tag_name
                    FROM pivot
                    LEFT JOIN article ON article.id = pivot.article_id
                    LEFT JOIN categorie ON article.categorie_id = categorie.id
                    LEFT JOIN user ON article.user_id = user.id
                    LEFT JOIN tag ON pivot.tag_id = tag.id
                    WHERE article.id = :article_id
                ";
        
                $statement = $this->db->prepare($query);
                $statement->bindParam(':article_id', $article_id, \PDO::PARAM_INT);
                $statement->execute();
        
                return $statement->fetchAll(\PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Handle the exception (log it, display an error message, etc.)
                // For simplicity, just rethrow the exception for now
                throw $e;
            }
        }
        

        

    public function insert($table, $data)
    {
        try {
            // Utilize the data passed instead of an empty array
            parent::insert($table, $data);
            return $this->lastInsertId();
            // Return the last inserted ID
        } catch (PDOException $e) {
            // Handle the error here if necessary (e.g., log the error)
            echo "Error during insertion: " . $e->getMessage();
            return false;
        }
    }


        public function read()
        {
            try {
                $query = "
                            SELECT 
                                article.id,
                                article.name,
                                article.description,
                                article.status,
                                categorie.name AS categorie_name,
                                user.name AS user_name,
                                GROUP_CONCAT(tag.name) AS tag_name
                                FROM pivot
                                LEFT JOIN article ON article.id = pivot.article_id
                                LEFT JOIN categorie ON article.categorie_id = categorie.id
                                LEFT JOIN user ON article.user_id = user.id
                                LEFT JOIN tag ON pivot.tag_id = tag.id
                                GROUP BY article.id;
                            ";
  

                $statement = $this->db->prepare($query);
                $statement->execute();
    
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Handle the exception (log it, display an error message, etc.)
                // For simplicity, just rethrow the exception for now
                throw $e;
            }
        }

        public function readView()
        {
            try {
                $query = "
                            SELECT 
                                article.id,
                                article.name,
                                article.description,
                                article.status,
                                categorie.name AS categorie_name,
                                user.name AS user_name,
                                GROUP_CONCAT(tag.name) AS tag_name
                                FROM pivot
                                LEFT JOIN article ON article.id = pivot.article_id
                                LEFT JOIN categorie ON article.categorie_id = categorie.id
                                LEFT JOIN user ON article.user_id = user.id
                                LEFT JOIN tag ON pivot.tag_id = tag.id
                                WHERE article.status = 'accepted'
                                GROUP BY article.id
                                ORDER BY article.id DESC
                                LIMIT 6;
                            ";
                $statement = $this->db->prepare($query);
                $statement->execute();
    
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Handle the exception (log it, display an error message, etc.)
                // For simplicity, just rethrow the exception for now
                throw $e;
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

//         public function update($table, $data, $id)
// {
//     try {
//         parent::update($table, $data, $id);
//         return true;
//     } catch (PDOException $e) {
//         echo "Error updating record: " . $e->getMessage();
//         return false;
//     }
// }

// wiki status
public function updateWikiState($id, $status)
    {
        try {
            $stmt = $this->db->prepare("UPDATE article SET status = :status WHERE id = :id");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true; // Update successful
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }





    // update

    public function updateArticleTags($articleId, $dataToUpdate, $newTagIds)
    {
        try {
            // Début de la transaction
            $this->db->beginTransaction();

            // Étape 1 : Mise à jour des données de l'article
            $updateQuery = "UPDATE `article` SET `name` = :name, `description` = :description, `categorie_id` = :categorie_id WHERE `id` = :article_id";
            $updateStatement = $this->db->prepare($updateQuery);
            $updateStatement->bindParam(':article_id', $articleId);
            $updateStatement->bindParam(':name', $dataToUpdate['name']);
            $updateStatement->bindParam(':description', $dataToUpdate['description']);
            $updateStatement->bindParam(':categorie_id', $dataToUpdate['categorie_id']);
            $updateStatement->execute();

            // Étape 2 : Suppression des enregistrements liés à cet article dans la table pivot
            $deleteQuery = "DELETE FROM `pivot` WHERE `article_id` = :article_id";
            $deleteStatement = $this->db->prepare($deleteQuery);
            $deleteStatement->bindParam(':article_id', $articleId);
            $deleteStatement->execute();

            // Étape 3 : Insertion des nouveaux enregistrements dans la table pivot
            $insertQuery = "INSERT INTO `pivot` (`article_id`, `tag_id`) VALUES (:article_id, :tag_id)";
            $insertStatement = $this->db->prepare($insertQuery);
            $insertStatement->bindParam(':article_id', $articleId);

            // Lier :tag_id à l'intérieur de la boucle
            foreach ($newTagIds as $tagId) {
                $insertStatement->bindParam(':tag_id', $tagId);
                $insertStatement->execute();
            }

            // Validation de la transaction
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            // En cas d'erreur, annulez la transaction
            $this->db->rollBack();
            echo "Erreur lors de la mise à jour des tags et de l'article : " . $e->getMessage();
            return false;
        }
    }

// search
    public function search($search)
        {
            try {
                $query = " SELECT 
                article.id,
                article.name,
                article.description,
                article.status,
                categorie.name AS categorie_name,
                user.name AS user_name,
                GROUP_CONCAT(tag.name) AS tag_name
                FROM pivot
                LEFT JOIN article ON article.id = pivot.article_id
                LEFT JOIN categorie ON article.categorie_id = categorie.id
                LEFT JOIN user ON article.user_id = user.id
                LEFT JOIN tag ON pivot.tag_id = tag.id
                WHERE article.status = 'accepted' AND article.name LIKE '%$search%'
                GROUP BY article.id;";
            
                $stmt = $this->db->query($query);
                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $records;
            } catch (PDOException $e) {
                echo "Error fetching records: " . $e->getMessage();
                return [];
            }
    }
}

