<?php
    function validateProfile(array $users): array | bool {
        if (isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            foreach ($users as $user) {
                foreach ($user as $field) {
                    if (!validateStringLength(strval($field))) return false;
                }
                if(in_array($user_id, $user)) {
                    return $user;
                }
            }
        }
        return false;
    }

    function validatePost(array $post) : bool {
        // if (!strtotime($post['time'])) return false;
        foreach ($post as $field) {
            if (is_string($field)) {
                if (!validatePostTextLength(strval($field))) return false;
            }
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