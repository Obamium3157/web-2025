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

$act = isset($_GET['act']) ?? null;

switch($act) {
    case ACT_UPLOADER:
        echo uploadData();
        break;
    default:
        echo getResponse(STATUS_ERROR, MESSAGE_INVALID_ACT);
        exit;
}
?>