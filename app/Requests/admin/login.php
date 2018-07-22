<?php
require_once('../../../resources.php');
require_once('../../Models/Admin.php');

use app\Models\Admin;

$_SESSION['validation_errors'] = [];
$loggedInAdmin = Admin::logIn($_POST['username'], $_POST['password']);

$redirectLocation = 'index.php';
if (empty($loggedInAdmin)) {
    $_SESSION['validation_errors']['admin_login'] = 'Username/Password is incorrect';
    $redirectLocation = 'login.php';
}

var_dump($_SESSION);
header('Location: ../../../admin/'.$redirectLocation);
