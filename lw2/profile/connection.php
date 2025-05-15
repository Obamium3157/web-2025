<?php

require_once 'profile.php';
require '../data/validate.php';
require '../data/sql/include/database.php';

$connection = connectToDB();
$posts = getPostsFromDB($connection, 100);
$users = getUsersFromDB($connection, 10);
$images = getImagesFromDB($connection, 100);

?>