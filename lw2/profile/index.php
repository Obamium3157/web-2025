<?php
    require_once 'profile.php';
    require '../data/validate.php';
    require '../data/sql/include/database.php';

    $connection = connectToDB();
    $posts = getPostsFromDB($connection, 100);
    $users = getUsersFromDB($connection, 10);
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Профиль</title>
        <link rel="stylesheet" href="../static/fonts/font.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            // $user_file = file_get_contents("../data/user.json", true);
            // $posts_file = file_get_contents("../data/post.json", true);

            // $users = json_decode($user_file, true);
            // $posts = json_decode($posts_file, true);

            $user = validateProfile($users);
            if (!$user) {
                header('Location: ../home', true);
                exit;
            }
        ?>
        <main class="app">
            <div class="menu">
                <div class="sidebar">
                    <a href="../home/">
                        <img class="navigation" src="../global_assets/Home_black.svg" alt="Домашняя страница">
                    </a>
                    <a href="../profile?user_id=1">
                        <img class="navigation profile_img" src="../global_assets/Icon_dot_black.svg" alt="Профиль">
                    </a>
                    <img class="navigation" src="../global_assets/Plus_black.svg" alt="Создать пост">
                </div>
            </div>

            <section class="content">
                <?php
                    $user_posts = array_filter($posts, function($post) use ($user) {
                        return isset($post['user_id']) && $post['user_id'] == $user['user_id'];
                    });
                    renderProfile($user, $user_posts);
                ?>
            </section>
        </main>
    </body>
</html>