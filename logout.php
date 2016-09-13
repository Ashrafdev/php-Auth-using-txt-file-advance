<?php
logout();

function logout()
{
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['is_auth']);

    header("Location: login.php");
    die();
}