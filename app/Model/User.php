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
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
}
