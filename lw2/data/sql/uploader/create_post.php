<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="api.php?act=uploader" enctype="multipart/form-data" method="POST">
        <div>
            <label for="">Название</label>
            <input type="text" name="title" required />
        </div>

        <div>
            <label for="">Картинка</label> 
            <input type="file" name="image" accept=".png" required />
        </div>
        <input type="submit" name="" id="">
    </form>
</body>
</html>