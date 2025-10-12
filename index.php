<?php
session_start();
require_once __DIR__ . "/app/Controller/AuthController.php";
require_once __DIR__ . "/app/Controller/ProfileController.php";
require_once __DIR__ . "/app/Controller/TaskController.php";
require_once __DIR__ . "/app/DAO/UserDAO.php";
require_once __DIR__ . "/app/DAO/TaskDAO.php";


require __DIR__ . "/config/Database.php";

$pdo = Database::getConnection();
$controller = $_GET["controller"] ?? "auth";
$action = $_GET["action"] ?? "register";
$userDao = new UserDAO($pdo);
$taskDao = new TaskDao($pdo);

switch ($controller) {
    case "auth":
        $authController = new AuthController($userDao);
        switch ($action) {
            case "login":
                $authController->login();
                break;
            case "register":
                $authController->register();
                break;
            case "logout":
                $authController->logout();
                break;
        }
        break;
    case "profile":
        $profileController = new ProfileController($userDao);
        switch ($action) {
            case "index":
                $profileController->index();
                break;
            case "update":
                $profileController->update();
                break;
            case "changePassword":
                $profileController->changePassword();
                break;
        }
        break;
    case "task":
        $taskController = new taskController($taskDao);
        switch ($action) {
            case "index":
                $taskController->index();
                break;
            case "create":
                $taskController->create();
                break;
            case "edit":
                $taskController->edit();
                break;
            case "delete":
                $taskController->delete();
                break;
            case "toggleDone":
                $taskController->toggleDone();
                break;
        }
        break;
}
