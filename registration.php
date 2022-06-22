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
    $email = $_GET['email'];
    $name = $_GET['name'];
    $surName = $_GET['surName'];
    $patronymicName = $_GET['patronymicName'];
    $emailCheck="SELECT * FROM users WHERE us_mail='$email' LIMIT 0,1";
    $result=$conn->query($emailCheck);
    if($result->num_rows == 0){
        $registration = "INSERT INTO users (us_surname, us_name, us_middlename, us_mail, us_rl_id) VALUES ('$surName', '$name', '$patronymicName', '$email', '0')";
        $reg=$conn->query($registration);
        header("Location: authorization.php");
        exit;
    }
    else{
        while($nm = $result->fetch_object()){
            echo "<script type='text/javascript'>alert('Пользователь с таким E-mail ($nm->us_mail) уже существует!');</script>";         
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="assets/css/registration.css">
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
        <div class="formReg">
            <form method="get" action="" autocomplete="on">
                <h1>Регистрация</h1>
                <div class="email">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required="required">
                </div>
                <div class="name">
                    <label for="name">Имя</label>
                    <input type="text" name="name" required="required">
                </div>
                <div class="surName">
                    <label for="surName">Фамилия</label>
                    <input type="text" name="surName" required="required">
                </div>
                <div class="patronymicName">
                    <label for="patronymicName">Отчество</label>
                    <input type="text" name="patronymicName" required="required">
                </div>
                <button class="regButton" type="submit" name="submit">Зарегистрироваться</button>
            </form>
        </div>
    </div>