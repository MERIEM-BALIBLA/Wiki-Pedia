<?php
namespace App\Controller;
use App\Controller\BaseController;
use App\Model\SinglepageModel;

class SinglepageController extends BaseController
{
    public function index()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $singlepageModel = new SinglepageModel();
            // Use getById to get a single article by its ID
            $articles = $singlepageModel->getById('pivot', $id);
            // var_dump($articles);
            $this->show("Singlepage", ['articles' => $articles]);            
        }
    }
    
}
