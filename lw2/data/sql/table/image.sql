CREATE TABLE image (
    image_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    post_id INT UNSIGNED NOT NULL,
    filename VARCHAR(120) NOT NULL,
    idx INT UNSIGNED NOT NULL
);

/* индекс картинкам задаем вручную */