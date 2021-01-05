
<?php

if (isset($_POST["inputEmail"]) && isset($_POST["inputPassword"]) && isset($_POST['inputName'])) {

    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);

    $un = $_POST["inputEmail"];
    $pw = md5($_POST["inputPassword"]);
    $nm = mysqli_real_escape_string($cn, $_POST["inputName"]);
    $rslt = mysqli_query($cn, "call regist_user('$un','$pw','$nm')");
    $arr = mysqli_fetch_array($rslt);

    if ($arr[0] == 'Already exists') {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["error"] = "Email already exists";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else if ($arr[0] == 'Done') {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["message"] = "Registration done successfully! ";

        header("location:../login.php");
    }
} else  header("location:../index.php?error=inv");
