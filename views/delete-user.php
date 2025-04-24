<?php
require_once __DIR__ . '/../models/user.php';

use models\user;

if (!isset($_GET['id'])) {
    header("Location: list-user.php");
    exit;
}

$user = user::find($_GET['id']);

if (!$user) {
    header("Location: list-user.php");
    exit;
}


user::delete($user['id']);
header("Location: list-user.php");
