<?php

const STATUS_ERROR = 'error';
const STATUS_OK = 'ok';

const MESSAGE_INVALID_REQUEST_METHOD = 'invalid method';
const MESSAGE_INVALID_ACT = 'invalid act';
const MESSAGE_INVALID_TITLE = 'invalid title';
const MESAGE_INVALID_SAVE_IMAGE = 'invalid save image';
const MESAGE_INVALID_SAVE_DB_IMAGE = 'invalid save db image';

const ACT_UPLOADER = 'uploader';

function uploadData() : string {
    $title = isset($_POST['title']) ?? null;
    if (!$title) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_TITLE);
    }

    if (!validateTitle($title)) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_TITLE);
    }

    $image = $_FILES && $_FILES['images']['error'] === UPLOAD_ERR_OK;

    if (!validateImage($image['type'], $image['size'])) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_TITLE);
    }

    $filename = generateImageName($title);

    $isSuccess = move_uploaded_file($image['tmp_name'], 'images/' . $filename);
    if (!$isSuccess) {
        echo getResponse(STATUS_ERROR, MESAGE_INVALID_SAVE_IMAGE);
    }

    $connection = connectToDatabase();
    $isSuccess =  savePostToDatabase($connection, $title, $filename);    
    if (!$isSuccess) {
        echo getResponse(STATUS_ERROR, MESAGE_INVALID_SAVE_DB_IMAGE);
    }

    return getResponse(STATUS_OK, '');
}

function getResponse(string $status, string $message) : string {
    $response = [
        'status' => $status,
        'message'=> $message,
    ];

    return (string)json_encode($response); // if returntype = false, return empty string
}

?>