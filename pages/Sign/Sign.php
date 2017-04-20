<?php 
require_once("../../class/role/CUser.php");

session_start( );
if ( isset($_POST['login-user'] ) && isset($_POST['login-pwd']) ) 
{
    $id = $_POST['login-user'];
    $pwd = $_POST['login-pwd'];

    $user = new CUser( $id );
    if ( $user->CheckPassword($pwd) ) 
    {
        header("location:../index.html");
    }
    else
    {
        header("location:../sign.html");
    }
}
else if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
{
    echo "1";
    $id = $_POST['username'];
    $pwd = $_POST['password'];
    $mail = $_POST['email'];
}
else
{
    echo "2";
}
 ?>

