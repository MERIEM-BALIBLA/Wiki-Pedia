<?php

namespace App\Controller;

use App\Controller\BaseController;

use App\Model\TagModel;

use PDOException;

class TagController extends BaseController
{
    public function index()
    {
        // Assuming you have instantiated your models
        $tagModel = new TagModel(); 
        
        $tags = $tagModel->index('tag','*');

        include 'App/view/admin/tags/index.php';
    }
    
    // public function insert()
    // {
    //     // Check if the form is submitted
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $table = array(
    //             'name' => $_POST['tag'],
    //         );

    //         // Instantiate the model
    //         $tagModel = new TagModel();

            
    //         // Insert data into the database
    //         $result = $tagModel->insert('tag', $table);
            

    //         if ($result) {
    //             echo "Data inserted successfully.";
    //         } else {
    //             echo "Failed to insert data.";
    //         }

    //         // Include the view file
    //         include 'App/View/admin/tags/Insert.php';
    //         header("Location: index");
    //     } else {
    //         // Render the form
    //         include 'App/View/admin/tags/Insert.php';
    //     }
    // } 

    public function insert()
{
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer le nom de la balise depuis le formulaire
        $tagName = $_POST['tag'];

        // Instancier le modèle TagModel
        $tagModel = new TagModel();

        // Vérifier si la balise existe déjà
        $existingTag = $tagModel->getTagByName($tagName);

        if ($existingTag) {
            // La balise existe déjà, afficher un message ou rediriger
            echo "Tag name already exists. Choose a different name.";
        } else {
            // La balise n'existe pas encore, procéder à l'insertion
            $table = array(
                'name' => $tagName,
            );

            // Insérer les données dans la base de données
            $result = $tagModel->insert('tag', $table);

            if ($result) {
                echo "Data inserted successfully.";
            } else {
                echo "Failed to insert data.";
            }
        }

        // Rediriger vers la page index
        header("Location: index");
    } else {
        // Rendre le formulaire
        include 'App/View/admin/tags/Insert.php';
    }
}

    public function update()
    {
        $table = 'tag';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $data = array(
                // 'id' => $id,
                'name' => $_POST['tag'],
                // 'description' => $_POST['description'],
            );

            $tagModel = new TagModel();

            $tags = $tagModel->update($table, $data, $id);
            header("Location: index");

        }
    }

    public function updateview() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $tagModel = new TagModel();
            $tags = $tagModel->getById('tag', $id);
            $this->show("admin/tags/update", ['tag' => $tags]);
        } 
    }

    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $tagModel = new TagModel();
            $tagModel->delete('tag', $id);
            header("Location: index");
            
        } 
    }

    public function deleteall()
    {
            $tagModel = new TagModel();
            $tagModel->deleteall('tag');
            header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

   

  




