<? session_start() ?>
<? $login = $_SESSION['user']['login']; ?>
<? require_once 'vendor/scripts/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/styles/style.css" />
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
  <script src="assets/js/profile.js" defer></script>
  <script src="assets/js/nav_scroll.js" defer></script>
  <script src="assets/js/auth_modal.js" defer></script>
  <script src="assets/js/scroll_buttons.js" defer></script>
  <title>MooChan</title>
</head>
<? require_once 'vendor/components/scroll_buttons.php'; ?>
<? require_once 'vendor/scripts/session_update.php'; ?>
