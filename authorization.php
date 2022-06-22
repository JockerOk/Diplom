<?php
session_start();
if($_SESSION['admin']){
    header("Location: personal_cabinet_for_admin.php");
    exit;
}
elseif($_SESSION['user']){
    header("Location: personal_cabinet_for_user.php");
    exit;    
}
if(isset($_GET['submit'])){
    include 'dbconnection.php';
    $conn = OpenCon();
    $login = $_GET['login'];
    $password = md5($_GET['password']);
    $usernameCheck="SELECT * FROM logins WHERE lg_username='$login' AND lg_password='$password' LIMIT 0,1";
    $result=$conn->query($usernameCheck);
    if($result->num_rows !== 0){
        while($obj = $result->fetch_object()){
            $roleCheck="SELECT * FROM users WHERE us_id='$obj->lg_us_id' LIMIT 0,1";
            $role=$conn->query($roleCheck);
            while($rl = $role->fetch_object()){
                if($rl->us_rl_id == 2){
                    $_SESSION['user'] = $obj->lg_us_id;
                    header("Location: personal_cabinet_for_user.php");
                    exit;
                }
                elseif($rl->us_rl_id == 1){
                    $_SESSION['admin'] = $obj->lg_us_id;
                    header("Location: personal_cabinet_for_admin.php");
                    exit;
                }
            }  
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Неверный логин или пароль!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/authorization.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Modulus+</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Modulus+</div>
                <nav class="navigation">
                    <a class="navigation__link" href="registration.php">Регистрация</a>
                    <a class="navigation__link" href="authorization.php">Войти</a>
                </nav>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="formAuthor">
            <form method="get" action="" autocomplete="on">
                <h1>Авторизация</h1>
                <div class="login">
                    <label for="login">Логин</label>
                    <input type="text" name="login" required="required">
                </div>
                <div class="password">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" required="required">
                </div>
                <button class="inButton" type="submit" name="submit">Войти</button>
            </form>
        </div>
    </div>