<?php

class UserDAO
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(User $user)
    {
        $query = "INSERT INTO users (name, firstname, email, password) VALUES (:name, :firstname, :email, :password)";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":name" => $user->getName(),
                ":firstname" => $user->getFirstname(),
                ":email" => $user->getEmail(),
                ":password" => $user->getPassword()
            ]
        );
    }

    public function findByEmail(User $user)
    {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute([":email" => $user->getEmail()]);
    }

    public function findById(User $user)
    {
        $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute([":id" => $user->getId()]);
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
