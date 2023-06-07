<?
session_start();

$_SESSION['error'] = NULL;
$_SESSION['message'] = NULL;
$_SESSION['page'] = NULL;

header('Location: ../../' . $_REQUEST['from']);