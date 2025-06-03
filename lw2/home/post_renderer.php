<?php

require_once '../data/validate.php';

if (empty($_GET['user_id'])) {
    foreach ($posts as $post) {
        $user_key = array_search($post['user_id'], array_column($users, 'user_id'));
        $user = $users[$user_key];

        $current_images = [];
        foreach ($images as $image) {
            if ($image['post_id'] == $post['post_id']) {
                array_push($current_images, $image);
            }
        }

        if (validatePost($post)) {
            renderPost($post, $user, $current_images);
        }
    }
} else {
    $user_id = getValidatedId($_GET['user_id']);
    if (!$user_id) {
        exit;
    }
    $user = getUserFromDB($connection, $user_id);

    if (!$user) {
        exit;
    }

    $user_posts = array_filter($posts, function ($post) use ($user) {
        return isset($post['user_id']) && $post['user_id'] == $user['user_id'];
    });

    foreach ($user_posts as $post) {
        $current_images = [];
        foreach ($images as $image) {
            if ($image['post_id'] == $post['post_id']) {
                array_push($current_images, $image);
            }
        }

        if (validatePost($post)) {
            renderPost($post, $user, $current_images);
        }
    }
}