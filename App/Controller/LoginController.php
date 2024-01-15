<?php
namespace App\Controller;

use App\Controller\BaseController;

use App\Model\LoginModel;

use PDOException;

class LoginController extends BaseController
{
    public function index()
    {
        $signModel = new LoginModel(); 
        
        // include 'App/view/Login.php';
        $this -> show('login');

    }

    public function login(){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            echo "Veuillez remplir tous les champs.";
            return;
        }

        $table = array (
            'email' => $_POST['email'],
            'password' => $_POST['password']
        );

        $signModel = new LoginModel();
        $existingUser = $signModel->getEmail('user', $table['email']);

        if($existingUser){

            $hashedPasswordFromDB = $existingUser['password'];

            if(password_verify($password,$hashedPasswordFromDB)){

                $_SESSION['user_id'] = $existingUser['id'];
                $_SESSION['name'] = $existingUser['name'];
                $_SESSION['role'] = $existingUser['role'];
                $_SESSION['email'] = $existingUser['email'];

                // $this -> show('index');
                 if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){

                        // $this -> show('Statistics');
                        header('Location: ' . APP_URL . 'Statistics');


                 }
                if(isset($_SESSION['role']) && $_SESSION['role'] === 'author'){
                    echo "Hello, " . $_SESSION['name'];
                    header('Location: ' . APP_URL . 'Wiki');
                var_dump($_SESSION['user_id']);

                }

            }else {
                echo"your pass incorrect";
                $this -> show('login');}
        
        }else echo "your email is incorrect";

    }

    public function logout()
    {
        session_unset(); // Désactive toutes les variables de session
        session_destroy(); // Détruit la session

        header ('Location: ' . APP_URL . 'login');
        exit();
    }

}

   

  




