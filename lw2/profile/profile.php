<?php
function renderProfile(array $user) {
    ?>
    <div class="top_panel"></div>
    <img src="static/man.png" alt="Аватар пользователя" class="profile_image">
    <h2 class="profile_name"><?php echo $user['name'] . ' ' . $user['surname'] ?></h2>
    <p class="description">
        <?php echo $user['description'] ?>
    </p>
    <div class="posts_counter">
    <img class="image" src="../global_assets/Image.svg" alt="Число постов">
        <span class="counter_text"><?php echo $user['posts_counter'] ?>  постов</span>
    </div>
        
    <div class="posts">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
        <img src="static/man.png" alt="Картинка в посте" class="post_image">
    </div>
    
    <?php
}
?>