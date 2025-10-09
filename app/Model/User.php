<?php


class User
{
    protected ?int $id;
    protected string $name;
    protected string $firstname;
    protected string $email;
    protected string $password;

    public function __construct(int $id, string $name, string $firstname, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
    }
}
