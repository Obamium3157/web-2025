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
            $data = file_get_contents("../data/post.json", true);
            $arr = json_decode($data, true);
        ?>
        <main class="app">
            <div class="menu">
                <div class="sidebar">
                    <a href="../home/">
                        <img class="navigation home_img" src="../global_assets/Home_dot_black.svg" alt="Домашняя страница">
                    </a>
                    <a href="../profile/">
                        <img class="navigation profile_img" src="../global_assets/Icon_black.svg" alt="Профиль">
                    </a>
                    <img class="navigation" src="../global_assets/Plus_black.svg" alt="Создать пост">
                </div>
            </div>
            
            <section class="content">
                <div class="top_panel"> </div>
                <?php 
                    require_once 'post.php';
                    foreach ($arr as $post) {
                        renderPost($post);
                    }  
                ?>
            </section>
        </main> 
    </body>
</html>