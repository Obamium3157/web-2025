<?php require './connection.php' ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="../static/fonts/font.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/modal.css">
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
            <?php include './post_renderer.php' ?>
        </section>
    </main>

    <!-- <div class="modal hidden">
        <div class="modal-image-wrapper">
            <span class="modal-image-wrapper__close">&times;</span>
            <button class="modal-slider__button modal-slider__button-prev">
                <img src="../global_assets/Arrow-left.svg" alt="Назад">
            </button>

            <img class="modal-image-wrapper__content" src="" alt="Просмотр изображения">

            <button class="modal-slider__button modal-slider__button-next">
                <img src="../global_assets/Arrow-right.svg" alt="Вперёд">
            </button>

            <div class="modal-counter">
                <span class="modal-counter__text"></span>
            </div>
        </div>
    </div> -->
    <div class="modal hidden">
        <div class="modal-image-wrapper">
            <div class="modal-slider-track"></div>

            <button class="modal-slider__button modal-slider__button-prev">
                <img src="../global_assets/Arrow-left.svg" alt="Назад">
            </button>
            <button class="modal-slider__button modal-slider__button-next">
                <img src="../global_assets/Arrow-right.svg" alt="Вперёд">
            </button>

            <div class="modal-counter">1/1</div>
            <span class="modal-image-wrapper__close">&times;</span>
        </div>
    </div>



    <script src="./js/sliderCore.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/modal.js"></script>
</body>

</html>