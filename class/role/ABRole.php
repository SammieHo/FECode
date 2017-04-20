<?php 
require_once("IRole.php");
require_once(dirname(__FILE__)."/../base/SqlConnect.php");

abstract class ABRole extends SqlConnect implements IRole
{
    protected $m_strUser;
    protected $m_strPwd;
    protected $m_nPow;

    private $b_IsGetInfo=false;

    function     __construct( )
    {
        parent::__construct();
    }
    
    public function      GetInfo( )
    {

    }

    public function      DisplayInfo( )
    {
        
    }

    public function      UpdateInfo( )
    {

    }

    public function      CheckPassword( $strPwd )
    {
        $this->GetInfo( );

        if ( $strPwd==$this->m_strPwd ) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

 ?>