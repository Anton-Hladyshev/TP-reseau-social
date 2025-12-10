<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function getInscriptionView() {
        include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'inscription_view.php';
    }

    public function getLoginView() {
        include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'connexion_view.php';
    }

    public function index() {
        $users = $this->userModel->findAll();
        return $users;
    }

    public function createUser() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $lastInsertId = $this->userModel->add($username, $email, $password);

        if ($lastInsertId) {
            include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'connexion_view.php';
        }
        else {
            echo "Erreur lors de l'inscription.";
        }
    }

    public function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $users = $this->userModel->findBy(['email' => $email]);

        if (count($users) === 1) {
            $user = $users[0];
            if (password_verify($password, $user['password'])) {
                // Authentification réussie
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['nom'];
                $_SESSION['email'] = $user['email'];
                header('Location: ?c=home');
                exit();
            }
        } else {
            header('Location: ?c=User&a=connexion');
            exit();
        }
    }
}