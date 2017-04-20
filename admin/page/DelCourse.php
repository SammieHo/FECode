<?php 

require_once(dirname(__FILE__)."/../../class/fun/CVideo.php");

if (isset($_GET['id']) ) 
{
    $cv = new CVideo( );
    if ($cv->DeleteVideo($_GET['id'])) 
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

 ?>