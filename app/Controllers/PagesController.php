<?php

namespace App\Controllers;

use App\Application\Views\View;

class PagesController
{
    public function home(): void
    {
        View::show(
            'pages/home',
            [
                'title' => 'Home page',
            ]
        );
    }

    public function detail(): void
    {
        View::show(
            'pages/post.detail',
            [
                'title' => 'Post detail',
            ]
        );
    }

    public function edit(): void
    {
        View::show(
            'pages/post.edit',
            [
                'title' => 'Post detail',
            ]
        );
    }

    public function post(): void
    {
        View::show(
            'pages/post',
            [
                'title' => 'Post page',
            ]
        );
    }

    public function login(): void
    {
        View::show(
            'pages/login',
            [
                'title' => 'Login',
            ]
        );
    }

    public function register(): void
    {
        View::show(
            'pages/register',
            [
                'title' => 'Register',
            ]
        );
    }
}
