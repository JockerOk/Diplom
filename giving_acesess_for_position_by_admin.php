<?php
include 'dbconnection.php';
StartSession();
if($_SESSION['admin']){
    if(isset($_GET['submit'])){
        $conn = OpenCon();
        $name = $_GET['jobTitle'];
        $Check="SELECT * FROM positions WHERE ps_name='$name' LIMIT 0,1";
        $result=$conn->query($Check);
        if($result->num_rows !== 0){
            $res=$result->fetch_object();
            $doc = $_GET['nameElement'];
            if($_GET['addDoc'] !== ''){
                $registration = "INSERT INTO positions_rights (pr_ps_id, pr_rg_id, pr_dc_id) VALUES ('$res->ps_id','1','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['addFolder'] !== ''){
                $registration = "INSERT INTO positions_rights (pr_ps_id, pr_rg_id, pr_dc_id) VALUES ('$res->ps_id','2','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['addTiket'] !== ''){
                $registration = "INSERT INTO positions_rights (pr_ps_id, pr_rg_id, pr_dc_id) VALUES ('$res->ps_id','3','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['delete'] !== ''){
                $registration = "INSERT INTO positions_rights (pr_ps_id, pr_rg_id, pr_dc_id) VALUES ('$res->ps_id','4','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['read'] !== ''){
                $registration = "INSERT INTO positions_rights (pr_ps_id, pr_rg_id, pr_dc_id) VALUES ('$res->ps_id','5','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['redact'] !== ''){
                $registration = "INSERT INTO positions_rights (pr_ps_id, pr_rg_id, pr_dc_id) VALUES ('$res->ps_id','6','$doc')";
                $reg=$conn->query($registration);
            }
            header("Location: personal_cabinet_for_admin.php");
            exit;
        }
        else{
            while($nm = $result->fetch_object()){
                echo "<script type='text/javascript'>alert('Такой должности не существует!');</script>";         
            }
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
    <link rel="stylesheet" href="assets/css/giving_acesess_for_position_by_admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Modulus+</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Modulus+</div>
                <nav class="navigation">
                    <a class="navigation__link" href="acesess_for_position_output.php">Проверка доступа</a>
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
                <p><b>Выдача прав:</b></p>
                <h1>Должности</h1>
                <div class="date-area">

                    <div class="jobTitle">
                        <label class="labelGiving" for="jobTitle">Должность</label>
                        <input type="text" name="jobTitle" required="required">
                    </div>

                    <div class="containerChek-1">
                        <label class="checkboxList" for="checkboxAddDoc">
                            <input class="checkbox__input" type="checkbox" id="checkboxAddDoc" name="addDoc">
                            Добавить документ
                        </label>
                    </div>
                    <div class="containerChek-2">
                        <label class="checkboxList" for="checkboxAddFolder">
                            <input class="checkbox__input" type="checkbox" id="checkboxAddFolder" name="addFolder">
                            Добавить папку
                        </label>

                    </div>
                    <div class="containerChek-3">
                        <label class="checkboxList" for="checkboxAddTiket">
                            <input class="checkbox__input" type="checkbox" id="checkboxAddTiket" name="addTiket">
                            Создавать тикет
                        </label>

                    </div>
                    <div class="containerChek-4">
                        <label class="checkboxList" for="checkboxDelete">
                            <input class="checkbox__input" type="checkbox" id="checkboxDelete" name="delete">
                            Удалить
                        </label>

                    </div>
                    <div class="containerChek-5">
                        <label class="checkboxList" for="checkboxRead">
                            <input class="checkbox__input" type="checkbox" id="checkboxRead" name="read">
                            Читать
                        </label>

                    </div>
                    <div class="containerChek-6">
                        <label class="checkboxList" for="checkboxRedact">
                            <input class="checkbox__input" type="checkbox" id="checkboxRedact" name="redact">
                            Редактировать
                        </label>
                    </div>

                    <div class="nameElement">
                        <label for="nameElement">Название</label>
                        <input type="text" name="nameElement" required="required">
                    </div>
                    <div class="typeElement">
                        <label for="typeElement">Тип</label>
                        <input type="text" name="typeElement" required="required">
                    </div>
                    <div class="groupBatton">
                        <button class="givAcesess" type="submit" name="submit">Назначить права</button>

                    </div>
                </div>
            </form>
        </div>
    </div>