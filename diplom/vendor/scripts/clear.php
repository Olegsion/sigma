<?
session_start();

$_SESSION['error'] = NULL;
$_SESSION['message'] = NULL;

header('Location: ../../' . $_REQUEST['from']);