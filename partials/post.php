<?php

// check the honeypot
$honeypot = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING);
if ($honeypot) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    exit;
}

// validate name
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$inputs['name'] = $name;
if (!$name || trim($name) === '') {
    $errors['name'] = 'Adja meg a nevét!';
}

// validate email
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!$email) {
        $errors['email'] = 'Érvényes email címet adjon meg!';
    }
} else {
    $errors['email'] = 'Adja meg az email címét!';
}

// validate message
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$inputs['message'] = $message;
if (!$message || trim($message) === '') {
    $errors['message'] = 'Adja meg az üzenetet!';
}
?>