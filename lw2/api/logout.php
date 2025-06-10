<?php

session_start();
session_destroy();
setcookie('auth', '', time() - 3600, '/');
http_response_code(200);