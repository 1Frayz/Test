<?php

namespace App\Models;

use  App\Application\Database\Model;

class User extends Model
{
    protected string $table = "users";
    protected array $fields = ['email', 'username', 'password', 'token'];
    protected string $email;
    protected string $username;
    protected string $password;

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
