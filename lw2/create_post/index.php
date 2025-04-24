<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Создать пост</title>
    </head>
    <body>
        <form id="create_post_form" action="api.php?act=uploader" enctype="multipart/form-data" method="POST">
            <div>
                <label>ID автора</label>
                <input type="text" name="user_id" required />
            </div>

            <div>
                <label for="imageInput">Картинка</label> 
                <input id="imageInput" type="file" name="image" accept=".png" required />
            </div>

            <div>
                <label for="">Текст</label>
                <input type="text" name="text" required />
            </div>
            
            <input type="submit">
        </form>
    </body>
</html>