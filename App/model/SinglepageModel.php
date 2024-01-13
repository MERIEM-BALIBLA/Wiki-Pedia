<?php

namespace App\Model;
use PDO;
use PDOException;

use App\Model\BaseModel;

class SinglepageModel extends BaseModel
{
    public function getById($table, $id)
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
            $statement->bindParam(':article_id', $id, PDO::PARAM_INT); // Change to :article_id
            $statement->execute();
    
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the exception (log it, display an error message, etc.)
            // For simplicity, just rethrow the exception for now
            throw $e;
        }
        
    }
    

 
    
    
}

