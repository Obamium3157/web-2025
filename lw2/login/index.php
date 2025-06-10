<?php require_once 'login.php' ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Логинация</title>
    <link rel="stylesheet" href="../static/fonts/font.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="app">
        <div class="header">
            <div class="text-container">
                <h1 class="text-container__login-text">Войти</h1>
            </div>
            <img class="header__title-image" src="../global_assets/login_image.png" alt="Заглавное изображение">
        </div>

        <form class="login" method="post" action="../api/login/login.php">
            <div class="field-email input-field">
                <label class="field-email__title" for="email">Электропочта</label>
                <div class="email-container">
                    <input id="email" name="email" class="field-email__input" type="email">
                    <span class="description">Введите Электропочту в формате *****@***.**</span>
                </div>
            </div>

            <div class="field-password input-field">
                <label class="field-password__title" for="password">Пароль</label>
                <div class="password-container">
                    <div class="password-img-container">
                        <button class="password-container__toggle-password-view" onclick="alert('helo')">
                            <img class="password-container__pass-img" src="../global_assets/Eye-off_black.svg"
                                alt="Спрятать пароль">
                        </button>

                    </div>
                    <input id="password" name="password" class="password-container__input" type="password">
                </div>
            </div>

            <input type="submit" class="continue" value="Продолжить">
                <!-- <span class="continue__button-text">Продолжить</span> -->
                <!-- Продолжить -->
            <!-- </input> -->
        </form>
    </main>
</body>

</html>