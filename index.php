<?php

if($_SESSION){
    echo "<pre>".print_r($_SESSION, 1)."</pre>";
}

// ini_set('error_reporting', E_STRICT);
session_start();
require_once('vendor/autoload.php');
require_once('app/core/Constants.php');

Router::dispatch();
ob_flush();
// session_destroy();
?>