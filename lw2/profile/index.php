<?php
    require_once 'profile.php';
    require '../data/validate.php';
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
            $user_file = file_get_contents("../data/user.json", true);
            $users = json_decode($user_file, true);

            $flag = false;
            if (isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
                $temp = validateProfile($users, $_GET['user_id']);
                if ($temp !== false) {
                    $user = $temp;
                } else {
                    $flag = true;
                }
            } else {
                $flag = true;
            }

            if ($flag) {
                header("Location: ../home/", true);
                exit;
            }
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
                    renderProfile($user);
                ?>
            </section>
        </main>
    </body>
</html>