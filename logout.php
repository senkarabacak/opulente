<?php
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    if (isset($_COOKIE['user'])) {
        unset($_COOKIE['user']); 
        setcookie('user', '', -1, '/'); 
    }
    header('Location:/');
?>