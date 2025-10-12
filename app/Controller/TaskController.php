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

            if (empty($title)) {
                $errors[] = "Le titre est requis";
            }
            if (empty($description)) {
                $errors[] = "La description est requise";
            }
            if (empty($due_date)) {
                $errors[] = "La date limite est requise";
            }

            if (empty($errors)) {
                $this->taskDao->create($_SESSION["id"], $title, $description, $due_date, false);
                $is_done = "Tâche créée";
            }
        }
        include __DIR__ . "/../View/task/create.php";
    }
    public function edit()
    {
        $this->isAuth();

        $id = $_GET["id"] ?? null;
        $task = $this->taskDao->findById($id);
        if (!$id || !$task) {
            header("Location: index.php?controller=task&action=index");
            exit;
        }

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = $_POST["title"] ?? "";
            $description = $_POST["description"] ?? "";
            $due_date = $_POST["due_date"] ?? "";

            if (empty($title)) {
                $errors[] = "Le titre est requis";
            }
            if (empty($description)) {
                $errors[] = "La description est requise";
            }
            if (empty($due_date)) {
                $errors[] = "La date limite est requise";
            }

            if (empty($errors)) {
                $this->taskDao->update($id, $title, $description, $due_date);
                $is_done = "Tâche modifiée";
                $task = $this->taskDao->findById($id);
            }
        }
        include __DIR__ . "/../View/task/edit.php";
    }
    public function delete()
    {
        $this->isAuth();

        $id = $_GET["id"] ?? null;
        $task = $this->taskDao->findById($id);
        if (!$id || !$task) {
            header("Location: index.php?controller=task&action=index");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->taskDao->delete($id);
            header("Location: index.php?controller=task&action=index");
            exit;
        }
        include __DIR__ . "/../View/task/delete.php";
    }
    public function toggleDone()
    {
        $this->isAuth();
        $id = $_POST["id"] ?? null;
        $done = $_POST["done"] ?? null;

        if ($id !== null && $done !== null) {
            $id = (int) $id;
            $done = (int) $done;
        }
        $done = $done === 1 ? 0 : 1;
        $this->taskDao->toggleDone($id, $done);

        header("Location: index.php?controller=task&action=index");
        exit;
    }
}
