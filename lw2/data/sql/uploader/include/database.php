<?php

const DB_HOST = '127.0.0.1';
const DB_NAME = 'blog';
const DB_USER = 'root'; // Создать своего юзера для этой бд
const DB_PASSWORD = ''; // Добавить пароль

function connectToDatabase() : PDO {
    $dsn = 'mysql:host=' . DB_HOST . ';dabname=' . DB_NAME;
    return new PDO($dsn, DB_USER, DB_PASSWORD);
}

function getPostsFromDatabase(PDO $connection, int $limit = 100) : array {
    $query = <<<SQL
        SELECT
          title, image
        FROM
          post
        LIMIT {$limit}
    SQL;    

    $statement = $connection->query($query);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Передаем конкретные параметры просто на всякий случай
function savePostToDatabase(PDO $connection, string $title, string $image): bool {
// function savePostToDatabase(PDO $connection, array $params) {
    $query = <<<SQL
        INSERT INTO
          post (title, image)
        VALUES
          (:title, :image)
    SQL;
    
    $statement = $connection->prepare($query);
    return $statement->execute([
        ':title' => $title,
        ':image' => $image,
    ]);
}

?>