
<?php

if (isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])) {
    $un = $_POST["inputEmail"];
    $pw = md5($_POST["inputPassword"]);
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    $rslt = mysqli_query($cn, "select ifnull(check_login('$un','$pw'),'wrong')");
    $arr = mysqli_fetch_array($rslt);

    if ($arr[0] == 'wrong') {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["error"] = "Invalid login credentials";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {


        if (isset($_POST["rem"])) {

            if ($_POST["rem"] == 'remember-me') {
                setcookie("usercookie", $un, time() + (86400 * 30), "/");
                setcookie("passcookie", $_POST["inputPassword"], time() + (86400 * 30), "/");
            }
        }



        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //session_start();
        $id = $arr[0];
        $res1 = mysqli_query($cn, "select id,fullname from users where id='$id'");
        $arr1 = mysqli_fetch_array($res1);
        $_SESSION["uid"] = $arr1[0];
        $_SESSION["uname"] = $arr1[1];
        header("location:../index.php");
    }
} else  header("location:../index.php?error=inv");
