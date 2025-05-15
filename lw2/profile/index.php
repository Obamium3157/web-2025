<?php
    require 'connection.php';
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
        <main class="app">
            <div class="menu">
                <div class="sidebar">
                    <a href="../home/">
                        <img class="sidebar__navigation" src="../global_assets/Home_black.svg" alt="Домашняя страница">
                    </a>
                    <a href="../profile?user_id=1">
                        <img class="sidebar__navigation" src="../global_assets/Icon_dot_black.svg" alt="Профиль">
                    </a>
                    <a href="../create_post/">
                        <img class="sidebar__navigation" src="../global_assets/Plus_black.svg" alt="Создать пост">
                    </a>
                </div>
            </div>

            <section class="content">
                <?php
                    include 'profile_renderer.php';
                ?>
            </section>
        </main>
    </body>
</html>