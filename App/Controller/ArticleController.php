<?php

namespace App\Controller;

use App\Controller\BaseController;

use App\Model\ArticleModel;

use App\Model\CategorieModel;
use App\Model\TagModel;
use PDOException;

class ArticleController extends BaseController
{
 
    public function index()
    {
        $articleModel = new ArticleModel(); 
        $articles = $articleModel->read();

        include 'App/view/admin/articles/index.php';
    }
    
    public function add(){
        $articleModel = new ArticleModel(); 
        // $this -> show("add");
        $categoriesModel = new CategorieModel();
        $categories = $categoriesModel->index('categorie','*');

        $tagModel = new TagModel();
        $tags = $tagModel->index('tag', '*');

        $data = [
            'categories' => $categories,
            'tags' => $tags,
        ];

        include "App/view/admin/articles/add.php";
        // $this->show('add',$data);
    }

    
   


}

    

  


   

  




