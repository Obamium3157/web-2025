<?php
function renderPost(array $post, array $user) {
    ?>
        <div class="post">
            <div class="post_header">
                <div class="user_header">
                    <img src=<?php echo '"../data/users_data/' . $user['user_id'] . '/' . $user['profile_picture'] . '"' ?> alt="Аватар пользователя" class="profile_image">
                    <span class="account_name">
                        <a class="account_name" href=<?php echo '"../profile?user_id=' .  $user['user_id'] . '"'?>>
                            <?php echo $user['name'] . ' ' . $user['surname'] ?>
                        </a>
                    </span>
                </div>
                <?php
                    if (($post['id'] == 4)):
                ?>
                    <img src="../global_assets/Edit_gray.svg" alt="Отредактировать пост" class="edit">
                <?php
                    endif
                ?>
            </div>
            <div class="post_content">
                <div class="post_img_container">
                    <!-- <div class="indicator">
                        <span class="indicator_text">1/3</span>
                    </div> -->
                    <!-- <button class="slider button_left">
                        <img src="../global_assets/Arrow-left.svg" alt="Свайп влево">
                    </button>
                    <button class="slider button_right">
                        <img src="../global_assets/Arrow-right.svg" alt="Свайп вправо">
                    </button> -->
                    <img src=<?php echo '"../data/users_data/' . $user['user_id'] . '/posts/' . $post['images'][0] . '"' ?> alt="Картинка в посте" class="post_content_img">
                </div>
            
                <div class="reaction">
                    <img class="like_symbol" src="../global_assets/like.svg" alt="❤">
                    <span class="likes_counter"><?php echo $post['likes_counter'] ?></span>
                </div>
                <p class="post_content_text">
                    <?php echo $post['text']; ?>
                </p>
                <p class="date"> <?php echo date("h:m:s d.m.y", $post['time']) ?> </p>
            </div>
        </div>
    <?php
}
?>