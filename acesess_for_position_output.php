<?php
include 'dbconnection.php';
StartSession();
if($_SESSION['admin']){

}
else{
    header("Location: authorization.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/acesess_for_position_output.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Modulus+</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Modulus+</div>
                <nav class="navigation">
                    <a class="navigation__link" href="">Проверка доступа</a>
                    <a class="navigation__link" href="personal_cabinet_for_admin.php">Личный кабинет</a>
                    <nav class="navigation-frame">
                        <ul class="topmenu">
                            <li class="navigation__link-sc"><a class="link_submenu-top" href="">Просмотр и создание</a>
                                <ul class="submenu">
                                    <li><a class="link_submenu" href="otdel_list.php">Отдела</a></li>
                                    <li><a class="link_submenu" href="positions_list.php">Должности</a></li>
                                    <li><a class="link_submenu" href="department_list.php">Департамента</a></li>
                                    <li><a class="link_submenu" href="users_list.php">Пользователя</a></li>
                                </ul>
                            </li>
                            <li class="navigation__link-give"><a class="link_submenu-top" href="">Выдача прав</a>
                                <ul class="submenu">
                                    <li><a class="link_submenu" href="giving_acesess_for_otdel_by_admin.php">Отделу</a></li>
                                    <li><a class="link_submenu" href="giving_acesess_for_position_by_admin.php">Должности</a></li>
                                    <li><a class="link_submenu" href="giving_acesess_for_departament_by_admin.php">Департаменту</a></li>
                                    <li><a class="link_submenu" href="giving_acesess_for_user_by_admin.php">Пользователю</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </nav>

            </div>
        </div>
    </header>
    <div class="container">
        <div class="formLk">
            <form method="get" action="" autocomplete="on">
                <h1>Проверить наличие прав у должности:</h1>
                <div class="date-area">
                    <div class="jobTitle">
                        <label for="jobTitle">Должность</label>
                        <input type="text" name="jobTitle" required="required">
                    </div>
                    <p class="acesessElement">На доступ к:</p>
                    <div class="nameElement">
                        <label for="nameElement">Название</label>
                        <input type="text" name="nameElement" required="required">
                    </div>
                    <div class="typeElement">
                        <label for="typeElement">Тип</label>
                        <input type="text" name="typeElement" required="required">
                    </div>
                    <div class="groupBatton">
                        <button class="verify" type="submit" name="submit">Проверить</button>

                    </div>
                    <div class="acesess"> Права на:
                        <p class="acesessRead">Чтение</p>
                        <p class="acesessRedact">Редактирование</p>
                        <p class="acesessDel">Удаление</p>
                        <p class="acesessAdd">Добавление документа</p>
                    </div>
                </div>
            </form>
        </div>
    </div>