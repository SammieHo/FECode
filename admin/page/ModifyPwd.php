<?php 
require_once(dirname(__FILE__)."/../../class/role/CAdmin.php");

session_start( );
$_SESSION['Admin-ID']="123456";

$admin = $_SESSION['Admin-ID'];

if ( !empty($_POST['Opassword']) && !empty($_POST['Npassword']) ) 
{
    $ca = new CAdmin( $admin );

    if( $ca->CheckPassword($_POST['Opassword']) )
    {
        $ca->SetPwd($_POST['Npassword']);
        if($ca->UpdateInfo( ))
        {
            echo "1";
        }
        else
        {

        }
    }
    else
    {

    }
}
else
{
    echo "33";
}

 ?>