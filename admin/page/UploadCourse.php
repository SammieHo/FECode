<?php 
require_once(dirname(__FILE__)."/../../class/fun/CVideo.php");
if ( isset($_POST['title']) && isset($_POST['desc'] ) ) 
{
    $v = new CVideo( );
    
    if( $v->InsertVideo( $_POST['title'] , $_POST['desc'] , $_FILES['photo'] , $_FILES['video'] , $_POST['class'] , $_POST['level']) )
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