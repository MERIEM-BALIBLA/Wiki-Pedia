<?php

namespace App\Controller;

use App\Controller\BaseController;

use App\Model\CategorieModel;

use PDOException;

class CategorieController extends BaseController
{
    public function index()
    {

        // Assuming you have instantiated your models
        $categorieModel = new CategorieModel(); 
        
        // Fetch categories from the database
        $categories = $categorieModel->index('categorie','*');

        include 'App/view/admin/categories/index.php';
    }

    public function indexview()
    {

        // Assuming you have instantiated your models
        $categorieModel = new CategorieModel(); 
        
        // Fetch categories from the database
        $categories = $categorieModel->index('categorie','*');

        include 'App/view/Index.php';
    }
   
   
    public function insert()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $table = array(
                'name' => $_POST['categorie'],
                'description' => $_POST['description'],
            );

            // Instantiate the model
            $categorieModel = new CategorieModel();

            // Insert data into the database
            $result = $categorieModel->insert('categorie', $table);

            if ($result) {
                echo "Data inserted successfully.";
            } else {
                echo "Failed to insert data.";
            }

            // Include the view file
            include 'App/View/admin/categories/Insert.php';
            header("Location: index");
        } else {
            // Render the form
            include 'App/View/admin/categories/Insert.php';
        }
    } 

    public function update()
    {
        $table = 'categorie';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $data = array(
                // 'id' => $id,
                'name' => $_POST['categorie'],
                'description' => $_POST['description'],
            );

            $categorieModel = new CategorieModel();

            $category = $categorieModel->update($table, $data, $id);
            // $this -> show("admin/categories/index");
            header("Location: index");

        }
    }

    public function updateview() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $categoriModel = new CategorieModel();
            $category = $categoriModel->getById('categorie', $id);
            $this->show("admin/categories/update", ['category' => $category]);
        } 
    }

    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $categoriModel = new CategorieModel();
            $categoriModel->delete('categorie', $id);
            header("Location: index");
            
        } 
    }

    public function deleteall()
    {
            $categoriModel = new CategorieModel();
            $categoriModel->deleteall('categorie');
            header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

   

  




