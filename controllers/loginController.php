<?php

//Controlador de login donde se recogen los datos y se ponen en una variable de sesion
require_once "BBDDController.php";
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$user = BBDDController::getUser($_REQUEST['email'], $_REQUEST['pass']);
//Compruebo que el usuario es administrador,usuario normal o ninguno
if ($user->rol == "administrador") {
    session_start();
    $_SESSION['activeUser'] = $user;
    header("location:../views/admin/AdminView.php");
    $_SESSION['usuarioNegativo'] = 2;
}
if ($user->rol == "usuario") {
    session_start();
    $_SESSION['activeUser'] = $user;
    header("location:../index.php");
    $_SESSION['usuarioNegativo'] = 2;
} 

if($user->rol != "usuario" && $user->rol != "administrador") {
    header("location:../views/user/Loging.php");
    $_SESSION['usuarioNegativo'] = 1;
}
?>