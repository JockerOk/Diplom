<?php
include 'dbconnection.php';
StartSession();
if($_SESSION['admin']){
    if(isset($_GET['submit'])){
        $conn = OpenCon();
        $name = $_GET['name'];
        $surName = $_GET['surName'];
        $docum = $_GET['nameElementDoc'];
        $patronymicName = $_GET['patronymicName'];
        $Check="SELECT * FROM users WHERE us_name='$name' AND us_surname='$surName' AND us_middlename='$patronymicName' LIMIT 0,1";
        $result=$conn->query($Check);
        if($result->num_rows !== 0){
            $res=$result->fetch_object();
            $userid = $res->us_id;
            $query ="SELECT * FROM users_rights WHERE ur_us_id='$userid' and ur_dc_id='$docum'";
            $getposId=$conn->query($query);
            //header("Location: personal_cabinet_for_admin.php");
            //exit;
        }
        else{
                echo "<script type='text/javascript'>alert('Такого сотрудника не существует!');</script>";         
        }
    }
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
    <link rel="stylesheet" href="assets/css/acesess_for_user_output.css">
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
                <h1>Проверить наличие прав у пользователя:</h1>
                <div class="date-area">
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
                    <div class="jobTitle">
                        <label for="jobTitle">Должность</label>
                        <input type="text" name="jobTitle" required="required">
                    </div>
                    <div class="department">
                        <label for="department">Департамент</label>
                        <input type="text" name="department" required="required">
                    </div>
                    <div class="branch">
                        <label for="branch">Отдел</label>
                        <input type="text" name="branch" required="required">
                    </div>
                    <p class="acesessElement">На доступ к:</p>
                    <div class="nameElement">
                        <label for="nameElement">Название</label>
                        <input type="text" name="nameElementDoc" required="required">
                    </div>
                    <div class="typeElement">
                        <label for="typeElement">Тип</label>
                        <input type="text" name="typeElement" required="required">
                    </div>
                    <div class="groupBatton">
                        <button class="verify" type="submit" name="submit">Проверить</button>

                    </div>
                    <div class="acesess"> Права на:
                        <?php 
                        if(isset($_GET['submit'])){
                            echo '<br>'; 
                            if($getposId->num_rows !== 0) {
                                while($nm = $getposId->fetch_object()){
                                    $rgId = $nm->ur_rg_id;
                                    $query ="SELECT * FROM rights WHERE rg_id='$rgId'";
                                    $rule=$conn->query($query);
                                    $fet = $rule->fetch_object();
                                    $ruleText=$fet->rg_name;
                                    echo $ruleText.'<br>';         
                                }    
                            }
                        }                       
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>