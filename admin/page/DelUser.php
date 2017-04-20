<?php 
require_once(dirname(__FILE__)."/../../class/fun/CAdminUser.php");

if (isset($_POST['del']) && !empty($_GET['id']) ) 
{
    $ca = new CAdminUser( );
    if ( $ca->DeleteUserInfo($_GET['id'])) 
    {
        echo "1";
    }
}
else
{
}
 ?>
