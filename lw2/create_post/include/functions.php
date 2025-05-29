<?php

const IMAGE_FORMAT = '.png';
const IMAGE_TYPE = 'image/png';
const IMAGE_SIZE = 2048 * 2048;
const IMAGE_MAX_LENGTH = 255;
const IMAGE_MAX_RANDOM = 15;
const IMAGE_MAX_SALT = 25;

const TEXT_MAX_LENGHT = 500;

function validateId(string $id): bool
{
    return is_numeric($id);
}

function check_FILES_hasNoErrors($temp): bool
{
    foreach ($_FILES[$temp]['error'] as $err) {
        if ($err != 0) {
            return false;
        }
    }

    return true;
}

function validateImage(string $type, int $size): bool
{
    return true;
    // return $type == IMAGE_TYPE && $size <= IMAGE_SIZE;
}

function generateImageNameFromUserData(string $first_name, string $last_name): string
{
    $randomPart = substr(sha1(rand(PHP_INT_MIN, PHP_INT_MAX) . time()), 0, IMAGE_MAX_RANDOM);
    
    return strtolower($first_name . '_' . $last_name . '_' . $randomPart);
}

function handleImageUpload(int $user_id, array $user): array
{
    $uploadField = isset($_FILES['image']) ? 'image' : 'images';
    $raw_images = $_FILES && check_FILES_hasNoErrors($uploadField) ? $_FILES[$uploadField] : null;

    if (!$raw_images) {
        throw new Exception('Invalid image file');
    }

    $images = [];
    $uploadPath = "../data/users_data/{$user_id}/posts/";

    foreach ($raw_images['name'] as $index => $name) {
        if (!validateImage($raw_images['type'][$index], $raw_images['size'][$index])) {
            throw new Exception('Image validation failed');
        }

        $image_filename = generateImageNameFromUserData($user['first_name'], $user['last_name']);
        $targetPath = $uploadPath . $image_filename;

        if (!move_uploaded_file($raw_images['tmp_name'][$index], $targetPath)) {
            throw new Exception(MESSAGE_INVALID_SAVE_DB_IMAGE);
        }

        $images[] = $image_filename;
    }

    return $images;
}

function validateText(string $text): bool
{
    return strlen($text) <= TEXT_MAX_LENGHT;
}

function validateAndGetText(): ?string
{
    if (empty($_POST['text'])) {
        return null;
    }

    $text = trim($_POST['text']);
    return validateText($text) ? $text : null;
}

?>