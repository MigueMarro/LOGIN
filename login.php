<?php
include("db.php");
include("errors.php");

if (isset($_POST['login_users'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user_check_query_login = "SELECT * FROM pacientes WHERE email='$email' AND password='$password' LIMIT 1";
    $result_login = mysqli_query($conex, $user_check_query_login);
    $user_login = mysqli_fetch_assoc($result_login);
    if ($user_login) {
        echo '<script>';
    echo 'console.log("success")';
    echo '</script>';
    header('Location: inicio.html');

        //esta registrado
    }else{
        echo '<script>';
        echo 'console.log("error")';
        echo '</script>';
        header('Location: index.php');
        //No esta registado
    }
    
}
