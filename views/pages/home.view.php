<?php

use App\Models\Post;
use App\Models\User;
use App\Application\Views\View;
use App\Application\Config\Config;

$currentPage = str_replace("/home/", "", $_SERVER['REQUEST_URI']);
$itemsPerPage = 2;

$postsModel = new Post();
$totalPosts = $postsModel->count();
$totalPages = ceil($totalPosts / $itemsPerPage);

$posts = $postsModel->all($currentPage, $itemsPerPage);

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
        <?php foreach ($posts as $post) {
            $user = (new User())->find('id', $post->getAuthor());
        ?>
            <a href="post/<?php echo htmlspecialchars($post->id()); ?>" class="card mb-4"
                style="text-decoration: none; color: black">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($post->getTitle()); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($user->getUsername()); ?></h6>
                    <p class="card-text"><?php echo htmlspecialchars($post->getDescription()); ?></p>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?php echo date('F j, Y', strtotime($post->created_at())); ?>
                </div>
            </a>
        <?php } ?>
        <nav>
            <ul class="pagination">
                <?php if ($currentPage > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $currentPage - 1; ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                        <a class="page-link" href="<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $currentPage + 1; ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <?php View::component('script') ?>
</body>

</html>