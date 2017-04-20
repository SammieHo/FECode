<?php 
require_once("ABRole.php");

/**
* 
*/
class CAdmin extends ABRole
{
    
    function __construct( $id )
    {
        parent::__construct( );
        $this->m_strUser = $id;
        $this->GetInfo();
    }

    function    GetInfo( )
    {
        $str = "SELECT * FROM tb_FECode_Admin WHERE FECodeA_User='$this->m_strUser' ";
        $this->SQL_Query( $str );

        if( !empty( $res = $this->SQL_Fetch_Assoc( ) ) )
        {
            $this->m_strPwd = $res['FECodeA_Pwd'];
            $this->m_nPow = $res['FECodeA_Pow'];

            return true;
        }
        else
        {
            return false;
        }
    }

    function    UpdateInfo( )
    {
        $str = "UPDATE tb_FECode_Admin SET FECodeA_Pwd='$this->m_strPwd' , FECodeA_Pow=$this->m_nPow WHERE FECodeA_User='$this->m_strUser ' ";

        if( $this->SQL_Query($str) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function    GetUser( )
    {
        return $this->m_strUser;
    }

    function    SetUser( $str )
    {
        $this->m_strUser = $str;
    }

    function    GetPwd( )
    {
        return  $this->m_strPwd;
    }

    function    SetPwd( $str )
    {
        $this->m_strPwd = $str;
    }
}

 ?>