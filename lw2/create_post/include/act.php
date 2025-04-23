<?php

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

function uploadData(array $input) : string {
    $connection = connectToDB();

    $user_id = isset($input['user_id']) ? (int) trim($input['user_id']) : null;
    if (!$user_id) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_FIELD);
    }

    if (!validateId($user_id)) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_FIELD);
    }

    $user = getUserFromDB($connection, $user_id);

    $image = isset($input['image']) ? $input['image'] : null;

    if (strpos($image, 'base64,') !== false) {
        $image = explode('base64,', $image)[1];
    }
    $imageData = base64_decode($image);
    if ($imageData === false) {
        return getResponse(STATUS_ERROR, MESSAGE_BASE64_DECODE_FAILED);
    }

    $image_filename = generateImageName($user['first_name'], $user['last_name']);

    $isSuccess = file_put_contents('../data/users_data/' . $user_id .'/posts/' . $image_filename, $imageData);

    if (!$isSuccess) {
        return getResponse(STATUS_ERROR, MESAGE_INVALID_SAVE_DB_IMAGE);
    }

    $text = isset($input['text']) ? trim($input['text']) : null;
    if (!$text) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_FIELD);
    }
    if (!validateText($text)) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_FIELD);
    }   
    $isSuccess = savePostToDB($connection, $user_id, $image_filename, $text);
    if (!$isSuccess) {
        return getResponse(STATUS_ERROR, MESSAGE_CANNOT_SAVE_POST_TO_DB);
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