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
            $data = file_get_contents("../data/user.json", true);
            $arr = json_decode($data, true);
        ?>
        <main class="app">
            <div class="menu">
                <div class="sidebar">
                    <a href="../home/">
                        <img class="navigation" src="../global_assets/Home_black.svg" alt="Домашняя страница">
                    </a>
                    <a href="../profile/">
                        <img class="navigation" src="../global_assets/Icon_dot_black.svg" alt="Профиль">
                    </a>
                    <img class="navigation" src="../global_assets/Plus_black.svg" alt="Создать пост">
                </div>
            </div>

            <section class="content">
                <?php
                    require 'profile.php';
                    renderProfile($arr[0]);
                ?>
                <!-- <div class="top_panel"></div>
                <img src="static/man.png" alt="Аватар пользователя" class="profile_image">
                <h2 class="profile_name">Ваня Денисов</h2>
                <p class="description">
                    Привет! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!
                </p>
                <div class="posts_counter">
                    <img class="image" src="../global_assets/Image.svg" alt="Число постов">
                    <span class="counter_text">11 постов</span>
                </div>
        
                <div class="posts">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                    <img src="static/man.png" alt="Картинка в посте" class="post_image">
                </div> -->
            </section>
        </main>
    </body>
</html>