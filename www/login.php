<?php
session_start();

$username= $_POST['username'];
$password=$_POST['password'];
if(!($username==='demo' && $password==='demo')){
    echo ('Login failed!');
}
else{
    echo ('proslo');
    $_SESSION['username']= $username;
    header("Location: ./secret.php");
}
