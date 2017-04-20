<?php 

require_once(dirname(__FILE__)."/../../class/fun/CTask.php");

if (isset($_GET['id']) ) 
{
    $ct = new CTask( );
    if ($ct->DeleteTask($_GET['id'])) 
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