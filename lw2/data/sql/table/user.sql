CREATE TABLE user (                                      
    user_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(25) NOT NULL,                               
    surname VARCHAR(25) NOT NULL,                            
    description TEXT NOT NULL,                               
    posts_counter INT UNSIGNED NOT NULL DEFAULT 0            
);                                                       