<?php

//turn on output buffering

ob_start();

function autoloader($class) {

   $filename = "app/controllers/".ucwords($class).".php";
   if(file_exists($filename)){
      require_once $filename;
   }

   $filename = "app/config/".ucwords($class).".php";
   if(file_exists($filename)){
      require_once $filename;
   }

   $filename = "app/core/".ucwords($class).".php";
   if(file_exists($filename)){
      require_once $filename;
   }

   $filename = "app/helpers/".ucwords($class).".php";
   if(file_exists($filename)){
      require_once $filename;
   }
   
   $filename = "app/models/".ucwords($class).".php";
   if(file_exists($filename)){
      require_once $filename;
   }

}

//run autoloader
spl_autoload_register('autoloader');
//start sessions
// Session::init();

// require_once('app/core/config.php');