<?php
    function validateProfile(array $users, int $user_id): array | bool {
        foreach ($users as $user) {
            foreach ($user as $field) {
                if (!validateStringLength(strval($field))) return false;
            }
            if(in_array($user_id, $user)) {
                return $user;
            }
        }
        return false;
    }

    function validatePost(array $post) : bool {
        if (!strtotime($post['time'])) return false;
        foreach ($post as $field) {
            if (!validatePostTextLength(strval($field))) return false;
        }
        return true;
    }


    function validatePostTextLength(string $data) : bool {
        return strlen($data) <= 512;
    }

    function validateStringLength(string $data) : bool {
        return strlen($data) <= 512;
    }

    function checkCurrentUserIsViewing(int $post_user_id): bool {
        return $post_user_id == 1;
    }
?>