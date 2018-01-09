<?php
    class Db {
    private $hostname = 'localhost';
    private $user = 'root';
    private $password = '1234';
    private $db = 'blog';
    private $link;
    function __construct(){
         
    }
    public static function registerNewUser($name,$pass,$email){
        $link = mysqli_connect('localhost','root','1234','blog');
        $msqlrequest = "INSERT INTO users (name,password,email) VALUES ('".$name."', '".$pass."', '".$email."')";
        if (mysqli_query($link,$msqlrequest)){
            header("Location: http://blog/");
            die();
        } else {
            return 'Cannot register new user';
        }
    }
    public static function auth($name, $pwd){
        $link = mysqli_connect('localhost','root','1234','blog');
        $request = "SELECT name FROM users WHERE name = '".$name."'";
        if (!mysqli_query($link,$request)){
            return NULL;
        }
        $currentName = mysqli_fetch_assoc(mysqli_query($link,$request));
        if ($currentName!==NULL){
            $requestPassword = "SELECT password FROM users WHERE name = '".$name."'"."AND password = '".$pwd."'";
            if (!mysqli_query($link,$requestPassword)){
                return false;
            }
            $currentPassword = mysqli_fetch_assoc(mysqli_query($link,$request));
            $ar = array('name'=>$currentName['name'],'password'=>$currentPassword['password']);    
            return $ar;

        } else 
                return false;
    }
}