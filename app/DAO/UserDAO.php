<?php

class UserDAO
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($name, $firstname, $email, $password)
    {
        $query = "INSERT INTO users (name, firstname, email, password) VALUES (:name, :firstname, :email, :password)";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":name" => $name,
                ":firstname" => $firstname,
                ":email" => $email,
                ":password" => $password
            ]
        );
    }

    public function findByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute([":email" => $email]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute([":id" => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile(User $user)
    {
        $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":name" => $user->getName(),
                ":id" => $user->getId(),
                ":email" => $user->getEmail()
            ]
        );
    }
    public function updatePassword(User $user)
    {
        $query = "UPDATE users SET password = :password WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":password" => $user->getPassword(),
                ":id" => $user->getId()
            ]
        );
    }

    public function delete(User $user)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":id" => $user->getId()
            ]
        );
    }
}
