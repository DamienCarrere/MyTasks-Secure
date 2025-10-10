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

        if (!$user) {
            echo "Utilisateur introuvable.";
            exit;
        }

        $name = $user["name"];
        $firstname = $user["firstname"];
        $email = $user["email"];

        include __DIR__ . "/../View/profile/profile.php";
    }
    public function update()
    {
        $this->isAuth();
    }
    public function changePassword()
    {
        $this->isAuth();
    }
}
