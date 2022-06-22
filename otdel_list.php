<?php
include 'dbconnection.php';
StartSession();
if($_SESSION['admin']){
    $conn = OpenCon();
    $query = "SELECT * FROM otdels";
    $res=$conn->query($query);   
    if(isset($_GET['submit'])){
        $otdname = $_GET['otdel'];
        $depname = $_GET['dep'];
        $query ="SELECT * FROM departments WHERE dp_name='$depname'";
        $getdepId=$conn->query($query);
        $depId=$getdepId->fetch_object();
        $query = "SELECT * FROM otdels WHERE ot_name='$otdname'";
        $check=$conn->query($query);
        if($check->num_rows == 0 AND $getdepId->num_rows !== 0){
            $query = "INSERT INTO otdels (ot_name, ot_dp_id) VALUES ('$otdname','$depId->dp_id')";
            $reg=$conn->query($query);
            header("Location: otdel_list.php");
        }
        else{
            echo "<script type='text/javascript'>alert('Отдел уже существует или неверно указан департамент!');</script>";
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
    <link rel="stylesheet" href="assets/css/department_list.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Modulus+</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Modulus+</div>
                <nav class="navigation">
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
                <h1>Отделы</h1>
                <div class="date-area">
                    <div>
                        <div class="departmentname">
                            <p>Название отдела</p>
                            <input type="text" name="otdel" required="required">
                        </div>
                        <div class="departmentotd">
                            <p>Название департамента</p>
                            <input type="text" name="dep" required="required">
                        </div>
                    </div>
                    <div>
                    <div class="discriptionForm">
                        <p>Список отделов</p>
                    </div>
                    <?php
                        $count = 1;
                        while($nm = $res->fetch_object()){
                            echo '<div class="department-$count"><input type="text" value="';
                            echo $nm->ot_name;
                            echo '" name="department" required="required" readonly></div>';
                            $count = $count + 1;         
                        }
                    ?>
                    </div>
                </div>
                <div class="groupBatton">
                        <button class="inButton" type="submit" name="submit">Создать</button>
                </div>
            </form>
        </div>
    </div>