<?
session_start();

header('Location: ../../../users.php?search=' . $_POST['user']);
