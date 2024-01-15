<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Model\ArticleModel;
use App\Model\CategorieModel;
use App\Model\IndexModel;

class IndexController extends BaseController {

    public function index()
    {
        $articleModel = new ArticleModel();
        $categoriesModel = new CategorieModel();
        // $articleModel = new ArticleModel();

        $categories = $categoriesModel->index('categorie','*');
        $articles = $articleModel->readView();
        
        $data = [
            'categories' => $categories,
            'articles' => $articles
        ];

        $this->show('Index', $data);
        // $this->show('home', $data);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            $obj = new ArticleModel();
            $input = $_POST['search'];
            $result = $obj->search($input);
            echo json_encode($result);
        } else {
            // Gérer le cas où la requête n'est pas une requête POST ou si 'search' n'est pas défini
            echo json_encode([]);
        }
    }

}
