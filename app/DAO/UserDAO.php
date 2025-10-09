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
        $statement->execute([":name" => $user->getName(), ":firstname" => $user->getFirstname(), ":email" => $user->getEmail(), ":password" => $user->getPassword()]);
    }
}
