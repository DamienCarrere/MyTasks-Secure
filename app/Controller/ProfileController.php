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
