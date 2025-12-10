<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Database.php';

class Commentaire
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM comments");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findBy(array $params)
    {
        $query = "SELECT * FROM comments WHERE " . implode(
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

    public function add($contenu, $utilisateur_id, $post_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO comments (contenu, utilisateur_id, post_id, date_commentaire) VALUES (:contenu, :utilisateur_id, :post_id, NOW())");
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->bindParam(':post_id', $post_id);
        return $stmt->execute();
    }

    public function update($id, $contenu, $utilisateur_id, $post_id)
    {
        $stmt = $this->conn->prepare("UPDATE comments SET contenu = :contenu, utilisateur_id = :utilisateur_id, post_id = :post_id WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->bindParam(':post_id', $post_id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
