<?php

session_start();
error_reporting(E_ALL);
date_default_timezone_set('asia/kolkata');
require_once 'vendor/autoload.php';

spl_autoload_register('classAutoload');
function classAutoload($class_name){
    require 'class/'.$class_name.'.php';
}