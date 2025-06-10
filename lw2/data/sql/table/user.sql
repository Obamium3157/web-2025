CREATE TABLE user (
    user_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    profile_picture VARCHAR(25) NOT NULL,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(319)NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    description VARCHAR(100) DEFAULT ''
);