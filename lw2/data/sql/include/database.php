<?php

const DB_HOST = '127.0.0.1';
const DB_NAME = 'blog';
const DB_USER = 'root'; // Создать своего юзера для этой бд
const DB_PASSWORD = ''; // Добавить пароль

function connectToDB() : PDO {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    return new PDO($dsn, DB_USER, DB_PASSWORD);
}

function getPostsFromDB(PDO $connection, int $limit = 100) : array {
  $query = <<<SQL
      SELECT
      post_id, user_id, image, time, text, likes_counter
      FROM
        post
      LIMIT {$limit}
  SQL;    

  $statement = $connection->query($query);

  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getPostFromDB(PDO $connection, int $post_id) : ?array {
    $query = <<<SQL
        SELECT
          post_id, user_id, image, time, text, likes_counter
        FROM
          post
        WHERE
          post_id = $post_id  
    SQL;

    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}

function getUsersFromDB(PDO $connection, int $limit = 100) : array {
  $query = <<<SQL
      SELECT
        user_id, profile_picture, first_name, last_name, email, password, description
      FROM
        user
      LIMIT {$limit}
  SQL;    

  $statement = $connection->query($query);

  return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getUserFromDB(PDO $connection, int $user_id) : ?array {
  $query = <<<SQL
        SELECT
          user_id, profile_picture, first_name, last_name, email, password, description
        FROM
          user
        WHERE
          user_id = $user_id  
    SQL;

    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}

function savePostToDB(PDO $connection, int $user_id, string $text): bool {
  // function savePostToDatabase(PDO $connection, array $params) {
      $query = <<<SQL
          INSERT INTO
            post (user_id, text)
          VALUES
            (:user_id, :text)
      SQL;
      
      $statement = $connection->prepare($query);
      return $statement->execute([
          ':user_id' => $user_id,
          ':text' => $text,
      ]);
  }

?>

