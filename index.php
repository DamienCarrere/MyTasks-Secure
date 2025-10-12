<?php
session_start();
require_once __DIR__ . "/app/Controller/AuthController.php";
require_once __DIR__ . "/app/Controller/ProfileController.php";
// require_once __DIR__ . "/app/Controller/TaskController.php";
require_once __DIR__ . "/app/DAO/UserDAO.php";
require_once __DIR__ . "/app/DAO/TaskDAO.php";


require __DIR__ . "/config/Database.php";

$pdo = Database::getConnection();
$controller = $_GET["controller"] ?? "auth";
$action = $_GET["action"] ?? "register";
$userDao = new UserDAO($pdo);

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
            case "updateProfile":
                $profileController->update();
                break;
            case "updatePassword":
                $profileController->changePassword();
                break;
        }
        break;
    case "task":
        $TaskDao = new TaskDAO($pdo);
        switch ($action) {
            case "index":
                break;
            case "create":
                break;
            case "edit":
                break;
            case "delete":
                break;
        }
        break;
}
