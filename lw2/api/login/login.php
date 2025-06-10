<?php

session_start();

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

function hashPassword(string $password): string {
    $salt = 'Sugar';
    return md5(md5($password) . $salt);
}

if (!$email || !$password) {
    header('Location: ../../login/index.php');
    exit;
}

require_once '../../data/sql/include/database.php';

$connection = connectToDB();
// Th1SIs7Tr8l@D1Ff1C8lTP3ssWOrD
$user = getUserByEmail($connection, $email);

if (!$user || $user['password'] !== hashPassword($password)) {
    header("Location: /login/index.php?error=1");
    exit;
}

$_SESSION['user_id'] = $user['user_id'];
setcookie('auth', $user['user_id'], time() + 7 * 24 * 60 * 60, "/", "", false, true);

header("Location: /home");