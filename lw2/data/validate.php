<?php
    function validateProfile(array $arr, int $id): int {
        foreach ($arr as $user) {
            if(in_array($id, $user)) {
                return $id;
            }
        }
        return -1;
    }

    function checkCurrentUserIsViewing(int $post_user_id): bool {
        return $post_user_id == 1;
    }
?>