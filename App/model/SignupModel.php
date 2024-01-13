<?php

namespace App\Model;
use PDOException;

use App\Model\BaseModel;

class SignupModel extends BaseModel
{
    private $name;
    // private $description;

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

    
        
}

