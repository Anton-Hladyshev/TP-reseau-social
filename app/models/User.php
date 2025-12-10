<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Database.php';

class User
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findBy(array $params)
    {
        $query = "SELECT * FROM users WHERE " . implode(
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

    public function add($nom, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (nom, email, password, date_inscription) VALUES (:nom, :email, :password, NOW())");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
        return $stmt->execute();
    }

    public function update($id, $nom, $email, $password)
    {
        $stmt = $this->conn->prepare("UPDATE users SET nom = :nom, email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
