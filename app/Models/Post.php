<?php

namespace App\Models;

use App\Application\Database\Model;

class Post extends Model
{
    protected array $fields = ['title', 'author', 'description', 'message'];
    protected string $title;
    protected string $author;
    protected string $description;
    protected string $message;
    protected string $table = 'posts';

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
