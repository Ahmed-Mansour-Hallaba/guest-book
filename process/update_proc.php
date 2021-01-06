
<?php


if (isset($_POST["mid"]) && isset($_POST['inputMessage']))  {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    
    $user_id = $_SESSION['uid'];
    $mid = $_POST['mid'];
    $qry=mysqli_query($cn,"select from_id from messages where id='$mid'");
    $arr=mysqli_fetch_row($qry);
    if($arr[0]==$user_id)
    {
        $cn1 = mysqli_connect(Host, UN, PW, DBname);
        $inputMessage=$_POST['inputMessage'];
        mysqli_query($cn1,"update  messages set content='$inputMessage' where id='$mid'");
        $_SESSION["message"] = "Your message has been send updated! ";
    }
    else 
    {
        
        $_SESSION["error"] = "Unauthorized action";

    }

    
    header("location:../sent.php");
} else  header("location:../index.php?error=inv");
