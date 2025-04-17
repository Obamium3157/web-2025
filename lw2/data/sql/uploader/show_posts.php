<?php
    require_once 'include/database.php';

    $connection = connectToDatabase();
    $posts = getPostsFromDatabase($connection);

    var_dump(connectToDatabase());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать пост</title>
</head>
<body>
    <div class="container">
        <h1>Создать пост</h1>
        <?php
            foreach ($posts as $post) {
                include 'templates/post.php';
            }
        ?>
    </div>
</body>
</html>