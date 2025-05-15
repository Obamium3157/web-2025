<?php

header('Content-Type: application/json');

ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

const STATUS_ERROR = 'error';
const STATUS_OK = 'ok';

const MESSAGE_INVALID_REQUEST_METHOD = 'invalid method';
const MESSAGE_INVALID_ACT = 'invalid act';
const MESSAGE_INVALID_FIELD = 'invalid field';
const MESAGE_INVALID_SAVE_IMAGE = 'invalid save image';
const MESAGE_INVALID_SAVE_DB_IMAGE = 'invalid save db image';
const MESSAGE_CANNOT_SAVE_POST_TO_DB = 'cannot save post to database';
const MESSAGE_BASE64_DECODE_FAILED = 'base64 decode failed';

const ACT_UPLOADER = 'uploader';

function uploadData(): string
{
    // if (empty($_POST['user_id'])) {
    //     return getResponse(STATUS_ERROR, 'invalid user id');
    // }

    // $user_id = (int) trim($_POST['user_id']);
    // if (!validateId($user_id)) {
    //     return getResponse(STATUS_ERROR, 'cannot validate user id');
    // }
    $user_id = 4;

    $connection = connectToDB();
    $user = getUserFromDB($connection, $user_id);

    if (isset($_FILES['image'])) {
        $temp = 'image';
    } else {
        $temp = 'images';
    }
    $image = $_FILES && ($_FILES[$temp]['error'] === UPLOAD_ERR_OK || $_FILES[$temp]['error'] == null) ? $_FILES[$temp] : null;

    if (!$image) {
        return getResponse(STATUS_ERROR, 'invalid image file');
    }

    if (!validateImage($image['type'], $image['size'])) {
        return getResponse(STATUS_ERROR, 'cannot validate image');
    }

    $image_filename = generateImageName($user['first_name'], $user['last_name']);

    $isSuccess = move_uploaded_file($image['tmp_name'], '../data/users_data/' . $user_id . '/posts/' . $image_filename);

    if (!$isSuccess) {
        return getResponse(STATUS_ERROR, MESAGE_INVALID_SAVE_DB_IMAGE);
    }

    if (empty($_POST['text'])) {
        return getResponse(STATUS_ERROR, 'invalid text');
    }

    $text = trim($_POST['text']);

    if (!validateText($text)) {
        return getResponse(STATUS_ERROR, 'cannot validate text');
    }

    $isSuccess = savePostToDB($connection, $user_id, [$image_filename], $text);
    if (!$isSuccess) {
        return getResponse(STATUS_ERROR, MESSAGE_CANNOT_SAVE_POST_TO_DB);
    }

    return getResponse(STATUS_OK, 'Post created successfully');
}

function getResponse(string $status, string $message): string
{
    $response = [
        'status' => $status,
        'message' => $message,
    ];

    return (string) json_encode($response); // if returntype = false, return empty string
}

?>