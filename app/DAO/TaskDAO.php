<?php

class TaskDAO
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Task $task)
    {
        $query = "INSERT INTO users (title, description, due_date, done) VALUES (:title, :description, :due_date, :done)";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":title" => $task->getTitle(),
                ":description" => $task->getDescription(),
                ":due_date" => $task->getDueDate(),
                ":done" => $task->getDone()
            ]
        );
    }

    public function findAllByUser(Task $task)
    {
        $query = "SELECT * FROM tasks WHERE user_id = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":user_id" => $task->getUserId()
            ]
        );
    }

    public function findById(Task $task)
    {
        $query = "SELECT * FROM tasks WHERE id = :id LIMIT 1";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":id" => $task->getId()
            ]
        );
    }

    public function update(Task $task)
    {
        $query = "UPDATE tasks SET title = :title, description = :description, due_date = :due_date WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":title" => $task->getTitle(),
                ":description" => $task->getDescription(),
                ":due_date" => $task->getDueDate(),
                ":id" => $task->getDone()
            ]
        );
    }

    public function delete(Task $task)
    {
        $query = "DELETE FROM tasks WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":id" => $task->getId()
            ]
        );
    }

    public function toggleDone(Task $task)
    {
        $query = "UPDATE tasks SET done = :done WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                ":done" => $task->getDone(),
                ":id" => $task->getId()
            ]
        );
    }
}
