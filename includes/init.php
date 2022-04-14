<?php // init.php
// 초기화 ------------------------------------------------
require_once 'includes/functions.php';
require_once 'includes/elements.php';
ini_set('display_errors', 'On');
ini_set('session.use_strict_mode', 0);
mysqli_report(MYSQLI_REPORT_ALL);
session_start();
