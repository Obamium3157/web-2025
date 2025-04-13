CREATE TABLE post (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    text TEXT NOT NULL,
    likes_counter INT UNSIGNED DEFAULT 0
);