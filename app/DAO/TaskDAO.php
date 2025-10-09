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
}
