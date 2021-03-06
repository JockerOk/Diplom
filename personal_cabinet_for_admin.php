<?php
include 'dbconnection.php';
StartSession();
if($_SESSION['admin']){
    $conn = OpenCon();
    $userId = $_GET['mailname'];
    $query = "SELECT * FROM users WHERE us_mail='$userId' LIMIT 0,1";
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
    $query = "SELECT * FROM logins WHERE lg_us_id='$result->us_id' LIMIT 0,1";
    $res=$conn->query($query);
    $log = $res->fetch_object();
    if(isset($_GET['edit'])){
        $email = $_GET['email'];
        $query = "SELECT * FROM users WHERE us_mail='$email' LIMIT 0,1";
        $res=$conn->query($query);
        //echo $res->mysqli_error;
        $result = $res->fetch_object();    
        $login =$_GET['login'];
        $password = $_GET['password'];
        $query ="UPDATE logins SET lg_username='$login', lg_password='$password' WHERE lg_us_id='$result->us_id'";
        $res=$conn->query($query);
        header("Location: personal_cabinet_for_admin.php");
        exit;
    }
    if(isset($_GET['delete'])){
        $email = $_GET['email'];
        $query ="DELETE FROM users WHERE us_mail='$email'";
        $res=$conn->query($query);
        header("Location: personal_cabinet_for_admin.php");
        exit;
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
    <link rel="stylesheet" href="assets/css/personal_cabinet_for_admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Modulus+</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Modulus+</div>
                <nav class="navigation">
                    <a class="navigation__link" href="personal_cabinet_for_admin.php">???????????? ??????????????</a>
                    <nav class="navigation-frame">
                        <ul class="topmenu">
                            <li class="navigation__link-sc"><a class="link_submenu-top" href="">???????????????? ?? ????????????????</a>
                                <ul class="submenu">
                                    <li><a class="link_submenu" href="otdel_list.php">????????????</a></li>
                                    <li><a class="link_submenu" href="positions_list.php">??????????????????</a></li>
                                    <li><a class="link_submenu" href="department_list.php">????????????????????????</a></li>
                                    <li><a class="link_submenu" href="users_list.php">????????????????????????</a></li>
                                </ul>
                            </li>
                            <li class="navigation__link-give"><a class="link_submenu-top" href="">???????????? ????????</a>
                                <ul class="submenu">
                                    <li><a class="link_submenu" href="giving_acesess_for_otdel_by_admin.php">????????????</a></li>
                                    <li><a class="link_submenu" href="giving_acesess_for_position_by_admin.php">??????????????????</a></li>
                                    <li><a class="link_submenu" href="giving_acesess_for_departament_by_admin.php">????????????????????????</a></li>
                                    <li><a class="link_submenu" href="giving_acesess_for_user_by_admin.php">????????????????????????</a></li>
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
                <h1>???????????? ????????????</h1>
                <div class="date-area">
                    <div class="name">
                        <label for="name">??????</label>
                        <input type="text" value="<?php echo $result->us_name?>" name="name">
                    </div>
                    <div class="surName">
                        <label for="surName">??????????????</label>
                        <input type="text" value="<?php echo $result->us_surname?>" name="surName">
                    </div>
                    <div class="patronymicName">
                        <label for="patronymicName">????????????????</label>
                        <input type="text" value="<?php echo $result->us_middlename?>" name="patronymicName">
                    </div>
                    <div class="jobTitle">
                        <label for="jobTitle">??????????????????</label>
                        <input type="text" value="<?php echo $positions->ps_name?>" name="jobTitle">
                    </div>
                    <div class="department">
                        <label for="department">??????????????????????</label>
                        <input type="text" value="<?php echo $dep->dp_name?>" name="department">
                    </div>
                    <div class="branch">
                        <label for="branch">??????????</label>
                        <input type="text" value="<?php echo $otdel->ot_name?>" name="branch">
                    </div>
                    <div class="email">
                        <label for="email">E-mail</label>
                        <input type="email" value="<?php echo $result->us_mail?>" name="email">
                    </div>
                    <div class="login">
                        <label for="login">??????????</label>
                        <input type="text" value="<?php echo $log->lg_username?>" name="login">
                    </div>
                    <div class="password">
                        <label for="password">????????????</label>
                        <input type="text" value="<?php echo $log->lg_password?>" name="password">
                    </div>
                    <div class="groupBatton">
                        <button class="inButton" type="submit" name="edit">?????????????????? ??????????????????</button>
                        <button class="inButton" type="submit" name="delete">?????????????? ????????????????????</button>
                    </div>
                </div>
            </form>
        </div>
    </div>