<?php

const STATUS_ERROR = 'error';
const STATUS_OK = 'ok';

const MESSAGE_INVALID_REQUEST_METHOD = 'invalid method';
const MESSAGE_INVALID_ACT = 'invalid act';
const MESSAGE_INVALID_ID = 'invalid title';
const MESAGE_INVALID_SAVE_IMAGE = 'invalid save image';
const MESAGE_INVALID_SAVE_DB_IMAGE = 'invalid save db image';

const ACT_UPLOADER = 'uploader';

function uploadData() : string {
    $user_id = isset($_POST['user_id']) ?? null;
    if (!$user_id) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_ID);
    }

    if (!validateId($user_id)) {
        return getResponse(STATUS_ERROR, MESSAGE_INVALID_ID);
    }

    
}

function getResponse(string $status, string $message) : string {
    $response = [
        'status' => $status,
        'message'=> $message,
    ];

    return (string)json_encode($response); // if returntype = false, return empty string
}

?>