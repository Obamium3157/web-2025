<?php
function renderPost(array $post, array $user, array $images) {
    ?>
        <div class="post">
            <div class="post_header">
                <div class="user_header">
                    <img src=<?php echo '"../data/users_data/' . $user['user_id'] . '/' . $user['profile_picture'] . '"' ?> alt="Аватар пользователя" class="profile_image">
                    <span class="account_name">
                        <a class="account_name" href=<?php echo '"../profile?user_id=' .  $user['user_id'] . '"'?>>
                            <?php echo $user['first_name'] . ' ' . $user['last_name'] ?>
                        </a>
                    </span>
                </div>
                <?php
                    if (($post['post_id'] == 1)):
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

                    <?php
                        foreach($images as $image) {
                    ?>
                            <img src="../data/users_data/<?php echo $user['user_id']?>/posts/<?php echo $image['filename'] ?>" alt="Картинка в посте" class="post_content_img">
                    <?php
                        }
                    ?>
                    
                </div>
                
                <div class="reaction">
                    <img class="like_symbol" src="../global_assets/like.svg" alt="❤">
                    <span class="likes_counter"><?php echo $post['likes_counter'] ?></span>
                </div>
                <p class="post_content_text">
                    <?php echo $post['text']; ?>
                </p>

                <p class="date"> <?php echo date('h:m:s d.m.y', strtotime($post['time']))?> </p>
            </div>
        </div>
    <?php
}
?>