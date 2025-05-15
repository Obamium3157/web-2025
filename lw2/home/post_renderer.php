<?php

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

?>