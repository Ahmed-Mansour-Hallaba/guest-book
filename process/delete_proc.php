
<?php


if (isset($_GET["mid"]))  {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    
    $user_id = $_SESSION['uid'];
    $mid = $_GET['mid'];
    $qry=mysqli_query($cn,"select from_id from messages where id='$mid'");
    $arr=mysqli_fetch_row($qry);
    if($arr[0]==$user_id)
    {
        $cn1 = mysqli_connect(Host, UN, PW, DBname);

        mysqli_query($cn1,"delete from messages where id='$mid'");
        $_SESSION["message"] = "Your message has been send deleted! ";
    }
    else 
    {
        
        $_SESSION["error"] = "Unauthorized action";

    }

    
    header("location:../sent.php");
} else  header("location:../index.php?error=inv");
