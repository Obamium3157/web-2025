<?php
function renderProfile(array $user, array $posts) {
    ?>
    <!-- <div class="top_panel"></div> -->
    <img src=<?php echo '"../data/users_data/' . $user['user_id'] . '/' . $user['profile_picture'] . '"' ?> alt="Аватар пользователя" class="profile_image">
    <h2 class="profile_name"><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></h2>
    <p class="description">
        <?php echo $user['description'] ?>
    </p>
    <div class="posts_counter">
    <img class="image" src="../global_assets/Image.svg" alt="Число постов">
        <span class="counter_text"><?php echo count($posts) ?>  постов</span>
    </div>
        
    <div class="posts">

        <?php
            foreach ($posts as $post) {
                renderPostImage($post);
            }
        ?>
    </div>
    <?php
}
?>

<?php
function renderPostImage(array $post) {
?>
    <img src=<?php echo '"../data/users_data/' . $post['user_id'] . '/posts/' . $post['image'] . '"' ?> alt="Картинка в посте" class="post_image">
<?php
}
?>
