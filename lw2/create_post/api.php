<?php

require_once 'include/act.php';
require_once 'include/functions.php';
require '../data/sql/include/database.php';

const METHOD_POST = 'POST';

if($_SERVER['REQUEST_METHOD'] !== METHOD_POST) {
    // Формируем ответ в виде json файла
    echo getResponse(STATUS_ERROR, MESSAGE_INVALID_REQUEST_METHOD);
    exit;
}

// var_dump(file_get_contents('php://input'));
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input)) {
    echo uploadData($input);
}

// $act = isset($_GET['act']) ?? null;

// switch($act) {
//     case ACT_UPLOADER:
//         echo uploadData($input);
//         break;
//     default:
//         echo getResponse(STATUS_ERROR, MESSAGE_INVALID_ACT);
//         exit;
// }
// header('Location: ../home/', true);
?>