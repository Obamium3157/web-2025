<?php

$user = validateProfile($users);
if (!$user) {
    header('Location: ../home', true);
    exit;
}

$user_posts = array_filter($posts, function($post) use ($user) {
    return isset($post['user_id']) && $post['user_id'] == $user['user_id'];
});

renderProfile($user, $user_posts, $images);

?>