<?php
function renderProfile(array $user, array $posts, array $images)
{
    ?>
    <!-- <div class="top-panel"></div> -->
    <img class="content__profile-image"
        src="../data/users_data/<?php echo $user['user_id'] ?>/<?php echo $user['profile_picture'] ?>"
        alt="Аватар пользователя">
    <h2 class="content__profile-name"><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></h2>
    <p class="content__description">
        <?php echo $user['description'] ?>
    </p>
    <div class="posts-counter">
        <img class="posts-counter__image" src="../global_assets/Image.svg" alt="Число постов">
        <span class="posts-counter__counter-text"><?php echo count($posts) ?> постов</span>
    </div>

    <div class="posts">

        <?php
        foreach ($posts as $post) {

            $current_images = [];
            foreach ($images as $image) {
                if ($image['post_id'] == $post['post_id']) {
                    array_push($current_images, $image);
                }
            }

            renderPostImage($post, $current_images);
        }
        ?>
    </div>
    <?php
}
?>

<?php
function renderPostImage(array $post, array $images)
{
    foreach ($images as $image) {
        ?>
        <img class="posts__post-image"
            src="../data/users_data/<?php echo $post['user_id'] ?>/posts/<?php echo $image['filename'] ?>"
            alt="Картинка в посте">
        <?php
    }
}
?>