<?php


class TaskController
{

    public $taskDao;

    public function __construct($taskDao)
    {
        $this->taskDao = $taskDao;
    }

    private function isAuth()
    {
        if (empty($_SESSION["id"])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    }

    public function index()
    {
        $this->isAuth();
        $tasks = $this->taskDao->findAllByUser($_SESSION["id"]);
        include __DIR__ . "/../View/task/list.php";
    }
    public function create()
    {
        $this->isAuth();
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = $_POST["title"] ?? "";
            $description = $_POST["description"] ?? "";
            $due_date = $_POST["due_date"] ?? "";

            if (empty($title) || empty($description) || empty($due_date)) {
                $errors = "Tous les champs sont obligatoire";
            }

            if (empty($errors)) {
                $task = new Task(
                    null,
                    $_SESSION["id"],
                    $title,
                    $description,
                    new DateTime($due_date),
                    false
                );
                $this->taskDao->create($task);
                $is_done = "Tâche créée";
            }
        }
        include __DIR__ . "/../View/task/create.php";
    }
    public function edit()
    {
        $this->isAuth();
    }
    public function delete()
    {
        $this->isAuth();
    }
    public function toggleDone()
    {
        $this->isAuth();
    }
}
