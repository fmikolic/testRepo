<?php
session_start();
require './data/config.php';


$username1= $_POST['username'];
$password1=$_POST['password'];
if(!($username1===USERNAME && $password1===PASSWORD)){
    echo ('Login failed!');
}
else{
    echo ('proslo');
    $_SESSION['username']= $username1;
    $_SESSION['password']=$password1;
    header("Location: ./secret.php");
}
