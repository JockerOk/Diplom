<?php
include 'dbconnection.php';
StartSession();
if($_SESSION['admin']){
    if(isset($_GET['submit'])){
        $conn = OpenCon();
        $name = $_GET['name'];
        $surName = $_GET['surName'];
        $patronymicName = $_GET['patronymicName'];
        $Check="SELECT * FROM users WHERE us_name='$name' AND us_surname='$surName' AND us_middlename='$patronymicName' LIMIT 0,1";
        $result=$conn->query($Check);
        if($result->num_rows !== 0){
            $res=$result->fetch_object();
            $doc = $_GET['nameElement'];
            if($_GET['addDoc'] !== ''){
                $registration = "INSERT INTO users_rights (ur_us_id, ur_rg_id, ur_dc_id) VALUES ('$res->us_id','1','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['addFolder'] !== ''){
                $registration = "INSERT INTO users_rights (ur_us_id, ur_rg_id, ur_dc_id) VALUES ('$res->us_id','2','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['addTiket'] !== ''){
                $registration = "INSERT INTO users_rights (ur_us_id, ur_rg_id, ur_dc_id) VALUES ('$res->us_id','3','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['delete'] !== ''){
                $registration = "INSERT INTO users_rights (ur_us_id, ur_rg_id, ur_dc_id) VALUES ('$res->us_id','4','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['read'] !== ''){
                $registration = "INSERT INTO users_rights (ur_us_id, ur_rg_id, ur_dc_id) VALUES ('$res->us_id','5','$doc')";
                $reg=$conn->query($registration);
            }
            if($_GET['redact'] !== ''){
                $registration = "INSERT INTO users_rights (ur_us_id, ur_rg_id, ur_dc_id) VALUES ('$res->us_id','6','$doc')";
                $reg=$conn->query($registration);
            }
            header("Location: personal_cabinet_for_admin.php");
            exit;
        }
        else{
            while($nm = $result->fetch_object()){
                echo "<script type='text/javascript'>alert('???????????? ???????????????????? ???? ????????????????????!');</script>";         
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
    <link rel="stylesheet" href="assets/css/giving_acesess_for_user_by_admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Modulus+</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Modulus+</div>
                <nav class="navigation">
                    <a class="navigation__link" href="acesess_for_user_output.php">???????????????? ??????????????</a>
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
                <p><b>???????????? ????????:</b></p>
                <h1>????????????????????</h1>
                <div class="date-area">
                    <div class="name">
                        <label for="name">??????</label>
                        <input type="text" name="name" required="required">
                    </div>
                    <div class="surName">
                        <label for="surName">??????????????</label>
                        <input type="text" name="surName" required="required">
                    </div>
                    <div class="patronymicName">
                        <label for="patronymicName">????????????????</label>
                        <input type="text" name="patronymicName" required="required">
                    </div>
                    <div class="jobTitle">
                        <label for="jobTitle">??????????????????</label>
                        <input type="text" name="jobTitle" required="required">
                    </div>
                    <div class="department">
                        <label for="department">??????????????????????</label>
                        <input type="text" name="department" required="required">
                    </div>
                    <div class="branch">
                        <label for="branch">??????????</label>
                        <input type="text" name="branch" required="required">
                    </div>
                    <div class="acesessChek">
                        <div class="containerChek">
                            <label class="checkboxList" for="checkboxAddDoc">
                                <input class="checkbox__input" type="checkbox" id="checkboxAddDoc" name="addDoc">
                                ???????????????? ????????????????
                            </label>
                        </div>
                        <div class="containerChek">
                            <label class="checkboxList" for="checkboxAddFolder">
                                <input class="checkbox__input" type="checkbox" id="checkboxAddFolder" name="addFolder">
                                ???????????????? ??????????
                            </label>

                        </div>
                        <div class="containerChek">
                            <label class="checkboxList" for="checkboxAddTiket">
                                <input class="checkbox__input" type="checkbox" id="checkboxAddTiket" name="addTiket">
                                ?????????????????? ??????????
                            </label>

                        </div>
                        <div class="containerChek">
                            <label class="checkboxList" for="checkboxDelete">
                                <input class="checkbox__input" type="checkbox" id="checkboxDelete" name="delete">
                                ??????????????
                            </label>

                        </div>
                        <div class="containerChek">
                            <label class="checkboxList" for="checkboxRead">
                                <input class="checkbox__input" type="checkbox" id="checkboxRead" name="read">
                                ????????????
                            </label>

                        </div>
                        <div class="containerChek">
                            <label class="checkboxList" for="checkboxRedact">
                                <input class="checkbox__input" type="checkbox" id="checkboxRedact" name="redact">
                                ??????????????????????????
                            </label>
                        </div>
                    </div>
                    <div class="nameElement">
                        <label for="nameElement">????????????????</label>
                        <input type="text" name="nameElement" required="required">
                    </div>
                    <div class="typeElement">
                        <label for="typeElement">??????</label>
                        <input type="text" name="typeElement" required="required">
                    </div>
                    <div class="groupBatton">
                        <button class="givAcesess" type="submit" name="submit">?????????????????? ??????????</button>

                    </div>
                </div>
            </form>
        </div>
    </div>