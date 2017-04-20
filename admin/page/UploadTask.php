<?php 
require_once(dirname(__FILE__)."/../../class/fun/CTask.php");

if ( isset($_POST['title']) && isset($_POST['desc'] ) ) 
{
    $t = new CTask( );
    if( $t->InsertTask( $_POST['title'] , $_POST['desc'] , $_FILES['File']) )
    {
        echo "1";
    }
    else
    {
        echo "2";
    }
}
else
{

}

 ?>