<?php

use App\Application\Config\Config;
use App\Application\Views\View;

?>

<!DOCTYPE html>
<html lang="<?php Config::get('app.lang') ?>">

<head>
    <?php View::component('head') ?>
    <title><?php echo $title ?? 'Contact Us' ?></title>
</head>

<body>
    <?php View::component('nav') ?>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">New Post</h1>
        </div>
        <form action="/post" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php View::component('script') ?>
</body>

</html>