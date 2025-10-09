<?php

class UserDAO
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(string $name,  string $email, string $password)
    {
        $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    }
}
