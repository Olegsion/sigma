<?
session_start();

$_SESSION['error'] = NULL;

header('Location: ../../' . $_REQUEST['from']);