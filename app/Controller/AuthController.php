<?php

class AuthController
{

    public $userDao;

    public function __construct($userDao)
    {
        $this->userDao = $userDao;
    }

    public function register()
    {

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"] ?? "";
            $firstname = $_POST["firstname"] ?? "";
            $email = trim($_POST["email"]) ?? "";
            $password = $_POST["password"] ?? "";
            $password_confirmation = $_POST["password_confirmation"] ?? "";

            // verif mdp
            $rules = [
                "Le mot de passe doit faire au minimum 8 caractères" => fn($p) => strlen($p) >= 8,
                "Le mot de passe doit contenir au moins une majuscule" => fn($p) => preg_match("/[A-Z]/", $p),
                "Le mot de passe doit contenir au moins une minuscule" => fn($p) => preg_match("/[a-z]/", $p),
                "Le mot de passe doit contenir au moins un chiffre" => fn($p) => preg_match("/[0-9]/", $p),
                "Le mot de passe doit contenir au moins un caractère spécial" => fn($p) => preg_match("/[^A-Za-z0-9]/", $p),
            ];

            foreach ($rules as $errormsg => $rule) {
                if (!$rule($password)) {
                    $errors[] = $errormsg;
                }
            }
            // verif email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalide";
            }
            // verif mdp correspond
            if ($password !== $password_confirmation) {
                $errors[] = "Les mots de passe ne correspondent pas";
            }

            if (empty($errors)) {

                if ($this->userDao->findByEmail($email)) {
                    $errors[] = "Email déjà utlisé";
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $userId = $this->userDao->create($name, $firstname, $email, $hash);

                    $_SESSION["user_id"] = $userId;
                    session_regenerate_id(true);

                    header("Location: index.php?controller=auth&action=login");
                    exit;
                }
            }
        }
        include __DIR__ . "/../View/auth/register.php";
    }

    public function login()
    {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST["email"]) ?? "";
            $password = $_POST["password"] ?? "";

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalide";
            }

            if (empty($errors)) {

                $verifyEmail = $this->userDao->findByEmail($email);
                if ($verifyEmail && password_verify($password, $verifyEmail["password"])) {

                    $_SESSION["user_id"] = $verifyEmail["id"];
                    session_regenerate_id(true);

                    header("Location: index.php?controller=task&action=index");
                    exit;
                } else {
                    $errors[] = "Email ou mot de passe incorrect";
                }
            }
        }
        include __DIR__ . "/../View/auth/login.php";
    }
}
