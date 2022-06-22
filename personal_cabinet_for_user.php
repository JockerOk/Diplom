<?php
session_start();
if($_SESSION['user']){
    include 'dbconnection.php';
    $conn = OpenCon();
    $userId = $_SESSION['user'];
    $query = "SELECT * FROM users WHERE us_id='$userId' LIMIT 0,1";
    $res=$conn->query($query);
    //echo $res->mysqli_error;
    $result = $res->fetch_object();
    $query = "SELECT * FROM positions WHERE ps_id='$result->position_id' LIMIT 0,1";
    $res=$conn->query($query);
    $positions = $res->fetch_object();
    $query = "SELECT * FROM otdels WHERE ot_id='$result->otdel_id' LIMIT 0,1";
    $res=$conn->query($query);
    $otdel = $res->fetch_object();
    $query = "SELECT * FROM departments WHERE dp_id='$otdel->ot_dp_id' LIMIT 0,1";
    $res=$conn->query($query);
    $dep = $res->fetch_object();
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
    <link rel="stylesheet" href="assets/css/personal_cabinet_for_user.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Modulus+</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Modulus+</div>
                <nav class="navigation">
                    <a class="navigation__link" href="acesess_for_user_output.php">Проверка доступа</a>
                    <a class="navigation__link" href="personal_cabinet_for_user.php">Личный кабинет</a>
                </nav>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="formLk">
            <form method="get" action="form.php" autocomplete="on">
                <h1>Личные данные</h1>
                <div class="name">
                    <label for="name">Имя</label>
                    <input type="text" value="<?php echo $result->us_name?>" name="name" required="required" readonly>
                </div>
                <div class="surName">
                    <label for="surName">Фамилия</label>
                    <input type="text" value="<?php echo $result->us_surname?>" name="surName" required="required" readonly>
                </div>
                <div class="patronymicName">
                    <label for="patronymicName">Отчество</label>
                    <input type="text" value="<?php echo $result->us_middlename?>" name="patronymicName" required="required" readonly>
                </div>
                <div class="jobTitle">
                    <label for="jobTitle">Должность</label>
                    <input type="text" value="<?php echo $positions->ps_name?>" name="jobTitle" required="required" readonly>
                </div>
                <div class="department">
                    <label for="department">Департамент</label>
                    <input type="text" value="<?php echo $dep->dp_name?>" name="department" required="required" readonly>
                </div>
                <div class="branch">
                    <label for="branch">Отдел</label>
                    <input type="text" value="<?php echo $otdel->ot_name?>" name="branch" required="required" readonly>
                </div>
                <div class="email">
                    <label for="email">E-mail</label>
                    <input type="email" value="<?php echo $result->us_mail?>" name="email" required="required" readonly>
                </div>
            </form>
        </div>
    </div>