<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../static/fonts/font.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Создать пост</title>
</head>

<body>
    <div class="app">
        <div class="header">
            <button class="return" action="">
                <img src="../global_assets/Arrow-left.svg" alt="<">
            </button>
            <h1 class="header_text">Новый пост</h1>
        </div>

        <form id="create_post_form" action="api.php?act=uploader" enctype="multipart/form-data" method="POST">
            <!-- <div>
                    <label>ID автора</label>
                    <input type="text" name="user_id" required />
                </div> -->

            <div class="add_image">
                <div class="upload">
                    <img id="imagePreview" class="inner_img" src="../global_assets/Framed_Picture.svg"
                        alt="Вставить картинку">
                    <label id="imageInputLabel" for="imageInput" class="add_image_btn">Добавить фото</label>
                    <input id="imageInput" type="file" name="image" accept=".png" required />
                    <!-- <button class="add_image_btn">Добавить фото</button>
                        <input id="imageInput" type="file" name="image" value="Добавить фото" accept=".png" required /> -->
                </div>
            </div>

            <button class="add_photo">
                <img class="add_photo_img" src="../global_assets/Plus-square_16.svg" alt="">
                Добавить фото
            </button>
            <!-- <label for="add_img" class="add_photo">
                    <img class="add_photo_img" src="../global_assets/Plus-square_16.svg" alt="">
                    Добавить фото
                </label>
                <input id="add_img" type="file" name="image" accept=".png" required /> -->

            <input id="inputText" class="input_post_text" type="text" name="text" placeholder="Добавьте подпись..."
                required />

            <input class="submit_btn" type="submit" value="Поделиться">
        </form>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function (e) {
            const file = e.target.files[0]; // Получаем выбранный файл
            if (!file) return; // Если файл не выбран, выходим

            const preview = document.getElementById('imagePreview');
            const label = document.getElementById('imageInputLabel');
            const input = document.getElementById('imageInput')
            const reader = new FileReader(); // Создаем объект FileReader

            // Когда файл загрузится
            reader.onload = function (e) {
                preview.src = e.target.result; // Устанавливаем src превью
                preview.style.display = 'block'; // Показываем превью
                preview.style.maxWidth = '100%'; // Ограничиваем размер
                preview.style.maxHeight = '100%';
                preview.style.objectFit = 'contain'; // Сохраняем пропорции

                label.style.display = 'none';
                input.style.display = 'none';
            };

            reader.readAsDataURL(file); // Читаем файл как Data URL
        });
    </script>
</body>

</html>