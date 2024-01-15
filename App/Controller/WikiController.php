<?php
    namespace App\Controller;

    use App\Controller\BaseController;

    use App\Model\ArticleModel;

    use App\Model\CategorieModel;

    use App\Model\TagModel;
    use PDOException;

    class WikiController extends BaseController {
     
        public function index(){
            $articleModel = new ArticleModel();
            $tagModel = new TagModel(); 
            
            // Fetch articles with user and tag information
            $articles = $articleModel->readwiki();
            
            include 'App/view/client/wiki.php';
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
    
            include "App/view/client/add.php";
            // $this->show('add',$data);
        }

        public function updateview() {

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $articleModel = new ArticleModel();
                $wiki = $articleModel->wikiInfo($id);

                $categoriesModel = new CategorieModel();
                $categories = $categoriesModel->index('categorie','*');
        
                $tagModel = new TagModel();
                $tags = $tagModel->index('tag', '*');

                $data = [
                    'categories' => $categories,
                    'tags' => $tags,
                    'wiki' => $wiki
                ];
                
                $this->show("client/update", $data);
            } 
        }

        
        
        // insert
        public function insert()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Données de l'article
                $articleData = [
                    'name' => $_POST['wiki'],
                    'description' => $_POST['description'],
                    'categorie_id' => $_POST['categorie'],
                    'user_id' => $_POST['user'],
                ];
                // var_dump($_POST);die;
        
                // Instantiate the model for article
                $articleModel = new ArticleModel();
        
                // Insérez les données dans la table des articles
                $articleResult = $articleModel->insert('article', $articleData);
        
                if ($articleResult) {
                    $lastInsertedArticleId = $articleModel->lastInsertId();
                    $tagId=[];
                
                    // Tags du formulaire
                    $tagsInput = isset($_POST['tag']) ? $_POST['tag'] : [];
        
                    $tagModel = new TagModel();
        
                    foreach ($tagsInput as $tag) {
                       
                        $tagModel->insert('pivot', ['tag_id' => $tag, 'article_id' => $lastInsertedArticleId]);
        
                    }
        
                    echo "Data inserted successfully.";
                    header("Location: " . APP_URL . "wiki");
                } else {
                    echo "Failed to insert data.";
                }
            } else {
                include 'App/View/client/add.php';
            }
        }

        public function delete()
        {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $articleModel = new ArticleModel();
        
                // Supprimer de la table pivot
                $articleModel->delete('pivot', $id);
        
                // Supprimer de la table des articles
                $articleModel->delete('article', $id);
        
                header("Location: " . $_SERVER['HTTP_REFERER']);

            }
        }
        
        public function deleteall()
        {
                $articleModel = new ArticleModel();
                $articleModel->deleteall('pivot');
                $articleModel->deleteall('article');

                header("Location: " . $_SERVER['HTTP_REFERER']);
        }

        
        // wiki status
        public function updateState()
        {
            $wikiModel = new ArticleModel();
    
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get the values from the form
                $îd = $_POST['id'];
                $selectedState = $_POST['status'];
    
                $updateSuccess = $wikiModel->updateWikiState($îd, $selectedState);
                if ($updateSuccess) {
                    header('Location: '. $_SERVER['HTTP_REFERER']);
                    exit();
                } else {
                    echo "Error updating wiki status.";
                }
    
            }
        }



// WikiController update
public function update()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['wiki'];
        $description = $_POST['description'];
        $categorie_id = $_POST['categorie_id'];
        var_dump($name);

        $dataToUpdate = [
            'name' => $name,
            'description' => $description,
            'categorie_id' => $categorie_id,
        ];

        $articleModel = new ArticleModel();
        var_dump($dataToUpdate);

        $tags = isset($_POST['tag']) ? $_POST['tag'] : [];
        $updateSuccess = $articleModel->updateArticleTags($id, $dataToUpdate, $tags);
        header("Location: " . APP_URL . "wiki");

        
    } 
}


        
    }

      