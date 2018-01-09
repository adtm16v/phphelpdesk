<?php 
require 'db.php';

echo Db::registerNewUser($_POST['name'],$_POST['password'],$_POST['email']);

