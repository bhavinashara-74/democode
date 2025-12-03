<?php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
$system_path = 'system';
$application_folder = 'application';
if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path).'/';
}
$system_path = rtrim($system_path, '/').'/';
if ( ! is_dir($system_path)) {
    exit("Your system folder path does not appear to be set correctly.");
}
require_once $system_path.'core/CodeIgniter.php';
