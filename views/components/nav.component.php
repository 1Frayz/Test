<?php

use App\Application\Auth\Auth;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">WebSiteName</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/post">Post</a>
                </li>
            </ul>
            <?php
            if (!Auth::check()) {
            ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>
                </ul>
            <?php
            } else {
            ?>
                <form action="/logout" method="post">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</nav>