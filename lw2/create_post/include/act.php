<?php

header('Content-Type: application/json');

ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

const STATUS_ERROR = 'error';
const STATUS_OK = 'ok';

const MESSAGE_INVALID_REQUEST_METHOD = 'invalid method';
const MESSAGE_INVALID_ACT = 'invalid act';
const MESSAGE_USER_NOT_FOUND = 'user not found';
const MESSAGE_INVALID_TEXT_CONTENT = 'invalid text content';
const MESSAGE_INVALID_FIELD = 'invalid field';
const MESSAGE_INVALID_SAVE_IMAGE = 'invalid save image';
const MESSAGE_INVALID_SAVE_DB_IMAGE = 'invalid save db image';
const MESSAGE_CANNOT_SAVE_POST_TO_DB = 'cannot save post to database';

const MESSAGE_POST_CREATED = 'post created successfully';
const MESSAGE_UNEXPECTED_ERROR = 'an unexpected error occured';

const ACT_UPLOADER = 'uploader';

function uploadData(): string
{
    try {
        $user_id = 4;

        $connection = connectToDB();

        $user = getUserFromDB($connection, $user_id);
        if (!$user) {
            return getResponse(STATUS_ERROR, MESSAGE_USER_NOT_FOUND);
        }

        $images = handleImageUpload($user_id, $user);
        if (empty($images)) {
            return getResponse(STATUS_ERROR, MESSAGE_INVALID_SAVE_IMAGE);
        }

        $text = validateAndGetText();
        if ($text == null) {
            return getResponse(STATUS_ERROR, MESSAGE_INVALID_TEXT_CONTENT);
        }

        if (!savePostToDB($connection, $user_id, $images, $text)) {
            return getResponse(STATUS_ERROR, MESSAGE_CANNOT_SAVE_POST_TO_DB);
        }

        return getResponse(STATUS_OK, MESSAGE_POST_CREATED);
    } catch (Exception $e) {
        error_log("upload error: " . $e->getMessage());
        return getResponse(STATUS_ERROR, MESSAGE_UNEXPECTED_ERROR);
    }
}

function getResponse(string $status, string $message): string
{
    $response = [
        'status' => $status,
        'message' => $message,
    ];

    return (string) json_encode($response);
}