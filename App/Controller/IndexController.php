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
        $articleModel = new ArticleModel();

        $categories = $categoriesModel->index('categorie','*');
        $articles = $articleModel->read();
        

        $data = [
            'categories' => $categories,
            'articles' => $articles
        ];

        $this->show('Index', $data);
        // $this->show('home', $data);

    }
}
