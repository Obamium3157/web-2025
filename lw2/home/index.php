<?php
require 'connection.php';
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
    <main class="app">
        <div class="menu">
            <div class="sidebar">
                <a href="../home/">
                    <img class="sidebar__navigation" src="../global_assets/Home_dot_black.svg" alt="Домашняя страница">
                </a>
                <?php
                if (isset($users[0])):
                    ?>
                    <a href="../profile?user_id=<?php echo $users[0]["user_id"] ?>">
                        <img class="sidebar__navigation" src="../global_assets/Icon_black.svg" alt="Профиль">
                    </a>
                    <?php
                endif;
                ?>
                <a href="../create_post/">
                    <img class="sidebar__navigation" src="../global_assets/Plus_black.svg" alt="Создать пост">
                </a>
            </div>
        </div>

        <section class="content">
            <!-- <div class="top_panel"> </div> -->
            <?php
            include 'post_renderer.php';
            ?>
        </section>
    </main>
</body>

</html>