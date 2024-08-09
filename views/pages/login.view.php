<?php

use App\Application\Auth\Auth;
use App\Application\Config\Config;
use App\Application\Views\View;

?>

<!DOCTYPE html>
<html lang="<?php echo Config::get('app.lang'); ?>">

<head>
    <?php View::component('head'); ?>
    <title>Login</title>
</head>

<body>
    <?php View::component('nav'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mt-5">Login</h1>
                <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') : ?>
                    <div class="alert alert-danger" role="alert">
                        Invalid username or password.
                    </div>
                <?php endif; ?>
                <form action="/login" method="post" class="mt-4">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <?php View::component('script') ?>
</body>

</html>