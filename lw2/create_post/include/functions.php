<?php

const IMAGE_FORMAT = '.png';
const IMAGE_TYPE = 'image/png';
const IMAGE_SIZE = 2048 * 2048;
const IMAGE_MAX_LENGTH = 255;
const IMAGE_MAX_RANDOM = 15;

const TEXT_MAX_LENGHT = 500;

function validateId(string $id) : bool {
    return is_numeric($id);
}

function validateImage(string $type, int $size) : bool {
    return $type === IMAGE_TYPE && $size <= IMAGE_SIZE;
}

function validateText(string $text) : bool {
    return strlen($text) <= TEXT_MAX_LENGHT;
}

function generateImageName(string $first_name, string $last_name) : string {
    $randomPart = substr(sha1(rand(PHP_INT_MIN, PHP_INT_MAX) . time()), 0, IMAGE_MAX_RANDOM);
    // $first_part = explode('.', $title)[0];
    // $title = str_replace(" ", "_", $first_part);
    // $filename = substr($title, 0, IMAGE_MAX_LENGTH);

    

    // return $filename . "-" . $randomPart . IMAGE_FORMAT;
    return strtolower($first_name . '_' . $last_name . '_' . $randomPart);
}
?>