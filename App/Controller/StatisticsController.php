<?php 
    namespace App\Controller;
    use App\Model\ArticleModel;
    use App\Model\CategorieModel;
    use App\Model\TagModel;
    class StatisticsController extends BaseController {
     
        public function index() {
            $categorie = new CategorieModel();
            $countCat = $categorie->count();
            // $Artcount = $categorie -> ArtCount();

            $tag = new TagModel();
            $countTag = $tag->count();

            $article = new ArticleModel();
            $countArticle = $article->count();
            // $midle = $article -> midle();
            // $ArtCountTag = $article -> Artcount();


            $data = [
                'countCat' => $countCat,
                'countTag' => $countTag,
                'countArticle' => $countArticle,
                // 'midle' => $midle,
                // 'Artcount' => $Artcount,
                // 'ArtCountTag' => $ArtCountTag
            ];
            $this->show("admin/Statistics", $data);
        }
    }