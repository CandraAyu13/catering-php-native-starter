<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__.'/config/db.php';

function is_admin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}
function is_user() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user';
}
function redirect_if_not_admin() {
    if (!is_admin()) header("Location: /auth/login.php");
}
function redirect_if_not_user() {
    if (!is_user()) header("Location: /auth/login.php");
}
?>