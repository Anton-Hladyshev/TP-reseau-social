<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Database.php';

class Message
{
    private $conn;

    public function __construct($id, $titre, $contenu, $utilisateur_id)
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findBy(array $params)
    {
        $query = "SELECT * FROM posts WHERE " . implode(
            " AND",
            array_map(
                function ($key) {
                    return "$key = :$key";
                },
                array_keys($params)
            )
        );

        $stmt = $this->conn->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue(
                ":$key",
                $value
            );
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($titre, $contenu, $utilisateur_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO posts (titre, contenu, utilisateur_id, date_publication) VALUES (:titre, :contenu, :utilisateur_id, NOW())");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        return $stmt->execute();
    }

    public function update($id, $titre, $contenu, $utilisateur_id)
    {
        $stmt = $this->conn->prepare("UPDATE posts SET titre = :titre, contenu = :contenu, utilisateur_id = :utilisateur_id WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
