<?php

namespace App\Model;

use App\Model\BaseModel;
use PDO;

class SearchModel extends BaseModel {
    public function search($category, $query, $columns){
        $results = [];

        if (!empty($query)) {
            foreach ($columns as $column) {
                $query = "SELECT * FROM `$category` WHERE `$column` LIKE :search";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':search', $query . '%');
                $stmt->execute();
                
                $results[$column] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        return $results;
    }
}
