<?php


class ProfileController
{
    public $userDao;

    public function __construct($userDao)
    {
        $this->userDao = $userDao;
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

        $user = $this->userDao->findById($_SESSION["id"]);

        $name = $user["name"];
        $firstname = $user["firstname"];
        $email = $user["email"];

        include __DIR__ . "/../View/profile/profile.php";
    }
    public function update()
    {
        $this->isAuth();

        $user = $this->userDao->findById($_SESSION["id"]);

        $errorsP = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"] ?? "";
            $firstname = $_POST["firstname"] ?? "";
            $email = trim($_POST["email"]) ?? "";

            if (empty($name) || empty($firstname) || empty($email)) {
                $errorsP[] = "Tous les champs doivent être remplis";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorsP[] = "Email invalide";
            } else {

                $findEmail = $this->userDao->findByEmail($email);
                if ($findEmail && $findEmail["id"] != $_SESSION["id"]) {
                    $errorsP[] = "Email déjà utlisé";
                }
            }

            if (empty($errorsP)) {
                $this->userDao->updateProfile($_SESSION["id"], $name, $firstname, $email);
                $user = $this->userDao->findById($_SESSION["id"]);
                $_SESSION["profileUpdated"] = "Profil mis à jour";
                header("Location: index.php?controller=profile&action=index");
                exit;
            }
        }
        $user = $this->userDao->findById($_SESSION["id"]);
        $name = $user["name"];
        $firstname = $user["firstname"];
        $email = $user["email"];
        include __DIR__ . "/../View/profile/profile.php";
    }
    public function changePassword()
    {
        $this->isAuth();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $currentPassword = $_POST["currentPassword"] ?? "";
            $newPassword = $_POST["newPassword"] ?? "";
            $password_confirmation = $_POST["password_confirmation"] ?? "";

            $user_id = $this->userDao->findById($_SESSION["id"]);

            if (!password_verify($currentPassword, $user_id["password"])) {
                $errors[] = "Le mot de passe actuel est incorect";
            }

            // verif mdp
            $rules = [
                "Le mot de passe doit faire au minimum 8 caractères" => fn($p) => strlen($p) >= 8,
                "Le mot de passe doit contenir au moins une majuscule" => fn($p) => preg_match("/[A-Z]/", $p),
                "Le mot de passe doit contenir au moins une minuscule" => fn($p) => preg_match("/[a-z]/", $p),
                "Le mot de passe doit contenir au moins un chiffre" => fn($p) => preg_match("/[0-9]/", $p),
                "Le mot de passe doit contenir au moins un caractère spécial" => fn($p) => preg_match("/[^A-Za-z0-9]/", $p),
            ];

            foreach ($rules as $errormsg => $rule) {
                if (!$rule($newPassword)) {
                    $errors[] = $errormsg;
                }
            }

            if ($newPassword !== $password_confirmation) {
                $errors[] = "Les mots de passe ne correspondent pas";
            }

            if (empty($errors)) {

                $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                $this->userDao->updatePassword($_SESSION["id"], $hash);
                $errors = [];
                $_SESSION["passwordUpdated"] = "Mot de passe mis à jour";
                header("Location: index.php?controller=profile&action=index");
                exit;
            }
        }
        $user = $this->userDao->findById($_SESSION["id"]);
        $name = $user["name"];
        $firstname = $user["firstname"];
        $email = $user["email"];
        include __DIR__ . "/../View/profile/profile.php";
    }
}
