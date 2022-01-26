<?php
session_start();

$username= $_POST['username'];
$password=$_POST['password'];
if(!($username==='demo' && $password==='demo')){
    echo ('Login failed!');
}
else{
    $_SESSION['username']= $username;
    header("secret.php");
}
