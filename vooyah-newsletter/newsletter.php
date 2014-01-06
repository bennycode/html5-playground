<?php

$isValid = false;

// Prevent XSS
$formValues = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

// Validate email address
if (filter_var($formValues['EMAIL'], FILTER_VALIDATE_EMAIL)) {
  $isValid = true;
}

function saveEmailAddress() {
  global $formValues;

  if (file_put_contents('newsletter.txt', $formValues['EMAIL'] . ';', FILE_APPEND | LOCK_EX)) {
    return true;
  }
}

function emailEmailAddress() {
  global $formValues;

  $to = 'bn@bennyn.de';
  $from = $formValues['EMAIL'];

  $subject = 'Newsletter-Anmeldung';
  $body = 'Newsletter-Anmeldung: ' . $from;

  $header = 'FROM: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

  if (mail($to, $subject, $body, $header)) {
    return true;
  }
}

if ($isValid) {
  $savedEmail = saveEmailAddress();
  $emailedEmail = emailEmailAddress();
  if ($savedEmail || $emailedEmail) {
    echo 'OK';
  }
} else {
  echo 'INVALID';
}