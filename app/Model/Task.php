<?php


class Task
{
    protected ?int $id;
    protected int $user_id;
    protected string $title;
    protected string $description;
    protected \DateTime $due_date;
    protected bool $done;

    public function __construct(?int $id, int $user_id, string $title, string $description, \DateTime $due_date, bool $done)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->due_date = $due_date;
        $this->done = $done;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getDueDate(): \DateTime
    {
        return $this->due_date;
    }
    public function getDone(): bool
    {
        return $this->done;
    }
}
