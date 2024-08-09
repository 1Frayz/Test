<?php

use App\Application\Config\Config;
use App\Application\Views\View;
?>

<!DOCTYPE html>
<html lang="<?php echo Config::get('app.lang'); ?>">

<head>
    <?php View::component('head'); ?>
    <title>Register</title>
</head>

<body>
    <?php View::component('nav'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mt-5">Register</h1>
                <?php if (isset($_GET['error']) && $_GET['error'] === 'user_exists') : ?>
                    <div class="alert alert-danger" role="alert">
                        Username already exists.
                    </div>
                <?php endif; ?>
                <form action="/register" method="post" class="mt-4">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>
    <?php View::component('script') ?>
</body>

</html>