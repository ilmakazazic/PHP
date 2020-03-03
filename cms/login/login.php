<?php
require "../config.php";

if(isset($_POST['btn_submit']))
{
    $username=$_POST['tb_name'];
    $pass=$_POST['tb_pass'];
    
    $login=new User();
    $user=$login->Login($username, $pass);

    if($user)
    {
        session_start();
        if ($username=="Admin") {
            $_SESSION['user_logged']=true;
        }
        else{
            $_SESSION['basic_user']=true;
        }
        $_SESSION['username']=$username;
        header("Location: ../index.php");
       
    }else
    {
        header("Location: index.php");
        echo "user no exists";
    }
}
?>
