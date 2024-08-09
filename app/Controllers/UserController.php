<?php

namespace App\Controllers;

use App\Application\Helpers\Random;
use App\Models\User;
use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Application\Auth\Auth;

class UserController
{
    public function register(Request $request)
    {
        $user = new User();
        $user->setEmail($request->post('email'));
        $user->setUsername($request->post('username'));
        $user->setPassword($request->post('password'));
        $user->store();
        Redirect::to('/login');
    }

    public function login(Request $request)
    {
        $username = $request->post('username');
        $user = (new User())->find('username', $username) ?: (new User())->find('email', $username);
        if ($user) {
            if (password_verify($request->post('password'), $user->getPassword())) {
                $token = Random::str(50);
                $user->update([Auth::getTokenColumn() => $token]);
                setcookie('token', $token, time() + 24 * 60 * 60);
                Redirect::to('/home');
            } else {
                Redirect::to('/login');
            }
        } else {
            Redirect::to('/login');
        }
    }

    public function logout()
    {
        unset($_COOKIE[Auth::getTokenColumn()]);
        setcookie(Auth::getTokenColumn(), NULL);
        Redirect::to('/home');
    }
}
