<?php
session_start();

$_SESSION['error'] = NULL;
$_SESSION['message'] = NULL;

var_dump($_REQUEST['from']);

header('Location: ../../'. $_REQUEST['from']);