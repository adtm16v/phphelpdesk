<?php
require 'db.php';
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$pathParse = explode('/',$path);

if ($pathParse[1]==''){
    include_once('mainView.php'); 
    
} 
if ($pathParse[1]=='signup'){
    include_once 'signupView.php';
}
if ($pathParse[1]=='signin'){
    include_once 'signinView.php';
}
