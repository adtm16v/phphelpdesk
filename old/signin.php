<?php
require 'db.php';

var_dump( Db::auth($_POST['name'],$_POST['password']));
