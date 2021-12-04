<?php
// ini_set('error_reporting', E_STRICT);
session_start();
define('BASE_DIR', __DIR__.'/');
require_once('/var/www/vhost/lib/config/autoloader.php');
require_once('app/core/Constants.php');
Router::dispatch();
ob_flush();
?>