<?php

class TaskDAO
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($user_id, $title, $description, $due_date, $done)
    {
        $query = "INSERT INTO tasks (user_id, title, description, due_date, done) VALUES (:user_id, :title, :description, :due_date, :done)";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                "user_id" => $user_id,
                ":title" => $title,
                ":description" => $description,
                ":due_date" => $due_date,
                ":done" => $done ? 1 : 0
            ]
        );
    }

    public function findAllByUser($user_id)
    {
        $query = "SELECT * FROM tasks WHERE user_id = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":user_id" => $user_id
            ]
        );
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $query = "SELECT * FROM tasks WHERE id = :id LIMIT 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":id" => $id
            ]
        );
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description, $due_date)
    {
        $query = "UPDATE tasks SET title = :title, description = :description, due_date = :due_date WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":id" => $id,
                ":title" => $title,
                ":description" => $description,
                ":due_date" => $due_date
            ]
        );
    }

    public function delete($id)
    {
        $query = "DELETE FROM tasks WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":id" => $id
            ]
        );
    }

    public function toggleDone($id, $done)
    {
        $query = "UPDATE tasks SET done = :done WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":id" => $id,
                ":done" => $done ? 1 : 0
            ]
        );
    }
}
