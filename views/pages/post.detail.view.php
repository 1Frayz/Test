<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Application\Auth\Auth;
use App\Application\Views\View;
use App\Application\Config\Config;

$id = str_replace("/post/", "", $_SERVER['REQUEST_URI']);
$post = (new Post())->find('id', $id);
$user = (new User())->find('id', $post->getAuthor());
$comments = (new Comment())->find('post_id', $post->id(), true);
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars(Config::get('app.lang')); ?>">

<head>
    <?php View::component('head') ?>
    <title><?php echo htmlspecialchars($title); ?></title>
</head>

<body>
    <?php View::component('nav') ?>
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($post->getTitle()); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($user->getUsername()); ?></h6>
                <p class="card-text"><?php echo htmlspecialchars($post->getDescription()); ?></p>
                <p><?php echo nl2br(htmlspecialchars($post->getMessage())); ?></p>
                <?php if (Auth::check() && Auth::id() == $post->getAuthor()): ?>
                    <a href="/post/edit/<?php echo htmlspecialchars($post->id()); ?>" class="btn btn-primary">Update
                        post</a>
                <?php endif; ?>
            </div>
            <div class="card-footer text-muted">
                Posted on <?php echo date('F j, Y', strtotime($post->created_at())); ?>
            </div>
        </div>
        <form action="/comment" method="POST" class="mt-3">
            <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post->id()); ?>">
            <div class="form-group">
                <label for="comment">Add a comment:</label>
                <textarea id="comment" name="comment" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <?php if ($comments): ?>
            <div id="comments-<?php echo htmlspecialchars($post->id()); ?>" class="comments-section">
                <?php foreach ($comments as $comment):
                    $user = (new User())->find('id', $comment["user_id"]);
                ?>
                    <div class="comment mt-2 mb-3 p-3 border rounded">
                        <h6 class="font-weight-bold"><?php echo htmlspecialchars($user->getUsername()); ?></h6>
                        <p class="comment-text"><?php echo htmlspecialchars($comment["comment"]); ?></p>
                        <small class="text-muted">
                            Posted on <?php echo date('F j, Y', strtotime($comment["created_at"])); ?>
                        </small>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <?php View::component('script') ?>
</body>

</html>