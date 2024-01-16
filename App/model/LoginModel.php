<?php

namespace App\Model;
use PDOException;
use PDO;

use App\Model\BaseModel;

class LoginModel extends BaseModel
{ 
    public function index($table, $columns)
    {
        return parent::index($table, $columns);
    }
   
    // public function getEmail($table, $email)
    // {
    //     try {
    //         $query = "SELECT * FROM $table WHERE email = :email";
    //         $stmt = $this->db->prepare($query);
    //         $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    //         $stmt->execute();
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         // Handle the exception, log, or return false
    //         echo "Error getting data by id: " . $e->getMessage();
    //         return false;
    //     }
    // }
}

