<?php
session_start();
require_once __DIR__ . '/database.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: /peace_logistix/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
