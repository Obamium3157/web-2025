<?php
    require 'post.php';
    require '../data/validate.php';
    require '../data/sql/include/database.php';

    $connection = connectToDB();
    $posts = getPostsFromDB($connection, 100);
    $users = getUsersFromDB($connection, 10);
    $images = getImagesFromDB($connection, 100);
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Домашняя страница</title>
        <link rel="stylesheet" href="../static/fonts/font.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            // $post_file = file_get_contents("../data/post.json", true);
            // $user_file = file_get_contents("../data/user.json", true);
            // $posts = json_decode($post_file, true);
            // $users = json_decode($user_file, true);
        ?>
        <main class="app">
            <div class="menu">
                <div class="sidebar">
                    <a href="../home/">
                        <img class="navigation home_img" src="../global_assets/Home_dot_black.svg" alt="Домашняя страница">
                    </a>
                    <?php
                    if (isset($users[0])):
                    ?>
                        <a href="../profile?user_id=<?php echo $users[0]["user_id"]?>">
                            <img class="navigation profile_img" src="../global_assets/Icon_black.svg" alt="Профиль">
                        </a>
                    <?php
                    endif;
                    ?>
                    <a href="../create_post/">
                        <img class="navigation" src="../global_assets/Plus_black.svg" alt="Создать пост">
                    </a>
                </div>
            </div>
            
            <section class="content">
                <!-- <div class="top_panel"> </div> -->
                <?php 
                    foreach ($posts as $post) {
                        $user_key = array_search($post['user_id'], array_column($users, 'user_id'));
                        $user = $users[$user_key];

                        $current_images = [];
                        foreach ($images as $image) {
                            if ($image['post_id'] == $post['post_id']) {
                                array_push($current_images, $image);
                            }
                        }

                        if (validatePost($post)) {
                            renderPost($post, $user, $current_images);
                        }
                    }  
                ?>
            </section>
        </main> 
    </body>
</html>