<?php

use App\Models\Post;
use App\Application\Views\View;
use App\Application\Config\Config;

$id = str_replace("/post/edit/", "", $_SERVER['REQUEST_URI']);
$post = (new Post())->find('id', $id);
?>

<!DOCTYPE html>
<html lang="<?php Config::get('app.lang') ?>">

<head>
    <?php View::component('head') ?>
</head>

<body>
    <?php View::component('nav') ?>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Edit Post</h1>
        </div>
        <form action="/update" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($post->id()); ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="<?php echo htmlspecialchars($post->getTitle()); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="<?php echo htmlspecialchars($post->getDescription()); ?>" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5"
                    required><?php echo htmlspecialchars($post->getMessage()); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
    <?php View::component('script') ?>

</body>

</html>