<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'Message.php';

class PostController {
    private $postModel;

    public function __construct() {
        $this->postModel = new Message();
    }

    public function getCreationView() {
        include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.'createPost.php';
    }

    public function getUpdateView() {
        include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.'updatePost.php';
    }

    public function index() {
        $posts = $this->postModel->findAll();
        return $posts;  
    }

    public function createPost() {
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $auteur = $_SESSION['user_id'];

        $lastInsertId = $this->postModel->add($titre, $contenu, $auteur);

        if ($lastInsertId) {
            include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'post_view.php';
        }
        else {
            echo "Erreur lors de la création du message.";
        }
    }
}