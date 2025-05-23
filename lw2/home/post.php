<?php
function renderPost(array $post, array $user, array $images)
{
    ?>
    <div class="post">
        <div class="post-header">
            <div class="user-header">
                <img class="user-header__profile-image"
                    src="../data/users_data/<?php echo $user['user_id'] ?>/<?php echo $user['profile_picture'] ?>"
                    alt="Аватар пользователя">
                <span class="user-header__account-name">
                    <a class="user-header__account-name" href=<?php echo '"../profile?user_id=' . $user['user_id'] . '"' ?>>
                        <?php echo $user['first_name'] . ' ' . $user['last_name'] ?>
                    </a>
                </span>
            </div>
            <?php
            if (($post['post_id'] == 1)):
                ?>
                <img class="post-header__edit" src="../global_assets/Edit_gray.svg" alt="Отредактировать пост">
                <?php
            endif
            ?>
        </div>
        <div class="post-content">
            <div class="post-img-container">
                <?php
                if (count($images) > 1):
                ?>
                    <div class="button-organizer">
                        <div class="counter">
                            <span class="counter__text">1/3</span>
                        </div>
                        <div class="slider">
                            <button class="slider__button-prev slider__button">
                                <img class="slider__img" src="../global_assets/Arrow-left.svg" alt="Свайп влево">
                            </button>
                            <button class="slider__button-next slider__button">
                                <img class="slider__img" src="../global_assets/Arrow-right.svg" alt="Свайп вправо">
                            </button>
                        </div>
                    </div>
                <?php
                endif;
                ?>

                <?php
                foreach ($images as $index => $image) {
                    ?>
                    <img class="post-img-container__post-content-img <?php echo $index === 0 ? 'active' : ''; ?>"
                        src="../data/users_data/<?php echo $user['user_id'] ?>/posts/<?php echo $image['filename'] ?>"
                        alt="Картинка в посте">
                    <?php
                }
                ?>

            </div>

            <button class="reaction">
                <img class="reaction__like-symbol" src="../global_assets/like.svg" alt="❤">
                <span class="reaction__likes-counter"><?php echo $post['likes_counter'] ?></span>
            </button>

            <p class="post-content__post-text">
                <?php echo $post['text']; ?>
            </p>

            <p class="post-content__date"> <?php echo date('h:m:s d.m.y', strtotime($post['time'])) ?> </p>
        </div>
    </div>
    <?php
}
?>