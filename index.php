<?php
session_start();

require_once __DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'UserController.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'header_view.php';


$controller = isset($_GET['c']) ? $_GET['c'] : 'home';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';


switch (strtolower($controller)) {
    case 'user':
        $userController = new UserController();
        switch (strtolower($action)) {
            case 'inscription':
                $userController->getInscriptionView();
                break;
            case 'creer':
                $userController->createUser();
                break;
            case 'connexion':
                $userController->getLoginView();
                break;
            case 'login':
                $userController->loginUser();
                break;
            default:
                echo "Action non reconnue pour UserController.";
        }
        break;
}