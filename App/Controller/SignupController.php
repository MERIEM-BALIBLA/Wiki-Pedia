<?php

namespace App\Controller;

use App\Controller\BaseController;

use App\Model\SignupModel;

use PDOException;

class SignupController extends BaseController
{
    public function index()
    {
        $signModel = new SignupModel(); 
        
        include 'App/view/Signup.php';
    }
      
    public function loginview(){
        $this -> show("login");
    }


    private function validateUserData($name, $email, $password, $confirmPassword)
    {
        $errors = [];

        // Validation des données (ajoutez des validations appropriées)
        if (empty($name)) {
            $errors[] = "Le champ 'Nom' est requis.";
        }

        if (empty($email)) {
            $errors[] = "Le champ 'Email' est requis.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse e-mail n'est pas valide.";
        }

        if (empty($password)) {
            $errors[] = "Le champ 'Mot de passe' est requis.";
        } elseif (strlen($password) < 8 || strlen($password) > 10) {
            $errors[] = "Le mot de passe doit avoir entre 8 et 10 caractères.";
        }        

        if (empty($confirmPassword)) {
            $errors[] = "Le champ 'Confirmer le mot de passe' est requis.";
        } elseif ($password !== $confirmPassword) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        return $errors;
    }

    public function adduser()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
    
            // Validate user data
            $validationErrors = $this->validateUserData($name, $email, $password, $confirmPassword);

            // If there are validation errors, display them and return
            if (count($validationErrors) > 0) {
                $signModel = new SignupModel();
                include 'App/view/Signup.php';
                return; // Ajoutez cette ligne pour arrêter l'exécution
            }

            // Hash du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $table = array(
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'password_confirm' => $confirmPassword,
            );
    
            // Instantiate the model
            $signModel = new SignupModel();
    
            // Vérifier si l'e-mail existe déjà
            $existingUser = $signModel->getEmail('user', $table['email']);
            // var_dump($existingUser);
    
            if (!$existingUser) {
                // Vérifier si les mots de passe correspondent
                if (password_verify($table['password_confirm'], $table['password'])) {
                    // Insérer les données dans la base de données
                    try {
                        $result = $signModel->insert('user', $table);
                        // $this->show('login');
                    header('Location: ' . APP_URL . 'login');

                    header('Location: ' . APP_URL . 'login');
                    } catch (PDOException $e) {
                        throw new PDOException("Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage());
                    }
                } else {
                    echo "Les mots de passe ne correspondent pas.";
                    $this->show('signup');
                }
            } else {
                echo "L'e-mail existe déjà.";
                $this->show('signup');
            }
        }
    }

    // public function login(){

    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     if (empty($email) || empty($password)) {
    //         echo "Veuillez remplir tous les champs.";
    //         return;
    //     }

    //     $table = array (
    //         'email' => $_POST['email'],
    //         'password' => $_POST['password']
    //     );

    //     $loginModel = new SignupModel();
    //     $existingUser = $loginModel->getEmail('user', $table['email']);

    //     if($existingUser){

    //         $hashedPasswordFromDB = $existingUser['password'];

    //         if(password_verify($password,$hashedPasswordFromDB)){

    //             $_SESSION['name'] = $existingUser['name'];
    //             $_SESSION['role'] = $existingUser['role'];

    //         // Affichez les valeurs de session pour vérification
            

    //             // $this -> show('index');
    //              if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){

    //                     echo "hello: " . $_SESSION['name'] . "<br>";
    //                     echo "role " . $_SESSION['role'] . "<br>";
    //                     // echo "hello admin";
    //                     $this -> show('admin/Statistics');

    //              }
    //             else if(isset($_SESSION['role']) && $_SESSION['role'] === 'author'){

    //                 echo "Session name: " . $_SESSION['name'] . "<br>";
    //                 echo "Session role: " . $_SESSION['role'] . "<br>";
    //                 // include 'home.php';
    //                 // $this -> show('index');
    //                 header('Location: ' . APP_URL . 'index');
    //             }

    //         }else {
    //             echo"your pass incorrect";
    //             $this -> show('login');}
        
    //     }else echo "your email is incorrect";

    // }

    // public function logout()
    // {
    //     session_unset(); // Désactive toutes les variables de session
    //     session_destroy(); // Détruit la session

    //     // Rediriger vers la page de connexion (ou toute autre page que vous souhaitez)
    //     $this -> show('login');
    //     exit();
    // }

}

   

  




