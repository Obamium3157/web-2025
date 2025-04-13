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
                <h1 class="login_text">Войти</h1>
                <img src="static/login_image.png" alt="Заглавное изображение" class="title_image">
            </div>
            
            <div class="login">
                <div class="field_email">
                    <label class="field_title" for="email">Электропочта</label>
                    <input id="email" class="input" type="email">
                    <span class="description">Введите Электропочту в формате *****@***.**</span>
                </div>
                
                <div class="field_password">
                    <label class="field_title" for="password">Пароль</label>
                    <input id="password" class="input" type="password">
                    <!-- <img src="../global_assets/Eye-off_black.svg" alt="Спрятать пароль" class="pass_img"> -->
                </div>
                
                <button class="continue">
                    <span class="continue_button_text">Продолжить</span>
                    <!-- Продолжить -->
                </button>
            </div>
        </main>
    </body>
</html>