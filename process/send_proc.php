
<?php


if (isset($_POST["inputTo"]) && isset($_POST["inputMessage"])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    $to = $_POST["inputTo"];
    $mess = mysqli_real_escape_string($cn, $_POST["inputMessage"]);
    $from = $_SESSION['uid'];

    $rslt = mysqli_query($cn, "insert into messages (content,from_id,to_id,main_id) values('$mess','$from','$to',null)");

    if (mysqli_error($cn)) {
        $_SESSION["error"] = "Error occurred";
    }
    $_SESSION["message"] = "Your message has been send successfully! ";

    header("location:../index.php");
} else  header("location:../index.php?error=inv");
