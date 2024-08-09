<?php

use App\Application\Config\Config;
use App\Application\Views\View;
?>

<!DOCTYPE html>
<html lang="<?php echo Config::get('app.lang'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h4>Error</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">An error occurred</h5>
                        <p class="card-text">Message: <?= htmlspecialchars($message) ?></p>
                        <details>
                            <summary>Details</summary>
                            <pre><?= htmlspecialchars($trace) ?></pre>
                        </details>
                        <a href="/" class="btn btn-primary mt-3">Go Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php View::component('script') ?>
</body>

</html>