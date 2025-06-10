<?php

session_start();

if (isset($_SESSION['user_id']) || isset($_COOKIE['auth'])) {
    header('Location: ../home');
    exit;
}

