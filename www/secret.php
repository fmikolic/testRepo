<?php
session_start();

$username=$_SESSION['username'];
if(isset($username)){
    echo ($username);
}else{
    echo ('secret unutra');
}


