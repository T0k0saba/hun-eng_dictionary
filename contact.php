<?php
include('./partials/header.php');
?>

<?php

$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {

  // show the message
  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
  } elseif (isset($_SESSION['inputs']) && isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
    $inputs = $_SESSION['inputs'];
    unset($_SESSION['inputs']);
  }
  // show the form
  require_once __DIR__ . '/partials/get.php';
} elseif ($request_method === 'POST') {
  // check the honeypot and validate the field
  require_once __DIR__ . '/partials/post.php';

  if (!$errors) {
    // send an email
    require_once __DIR__ . '/partials/mail.php';
    // set the message
    $_SESSION['message'] =  'Köszönöm a megkeresést! Hamarosan jelentkezek.';
  } else {
    $_SESSION['errors'] =   $errors;
    $_SESSION['inputs'] =   $inputs;
  }

  header('Location: contact.php', true, 303);
  exit;
}

?>

<?php
include('./partials/footer.php');
?>