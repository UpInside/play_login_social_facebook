<?php
ob_start();
session_start();
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$post = array_map('strip_tags', $post);
$post = array_map('trim', $post);

$callback = $post['callback'];
$callback_action = $post['callback_action'];

unset($post['callback'], $post['callback_action']);

if ($callback == 'Login') {

    switch ($callback_action) {
        case 'login_facebook':
            break;

        case 'logout':
            break;
    }
}

echo json_encode($json);

ob_end_flush();