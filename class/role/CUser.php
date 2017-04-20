<?php 
require_once("ABRole.php");
/**
* 
*/
class CUser extends ABRole
{
    protected $m_strName;
    protected $m_strPhoto;
    protected $m_strSign;
    protected $m_nLtime;
    protected $m_nPoint;
    protected $m_nExp;
    protected $m_dReg;

    function    __construct( $id )
    {
        parent::__construct( );

        $this->m_strUser = $id;
        $this->m_nPow = 5;
        $this->GetInfo( );
    }

    function    GetInfo()
    {
        $this->SQL_Query("SELECT * FROM tb_FECode_User WHERE FECodeU_User='$this->m_strUser' ");
        
        if( !empty($res = $this->SQL_Fetch_Assoc( ) ) )
        {
            $this->m_strPwd = $res['FECodeU_Pwd'];
            $this->m_strName = $res['FECodeU_Name'];
            $this->m_strPhoto = $res['FECodeU_Photo'];
            $this->m_strSign = $res['FECodeU_Sign'];
            $this->m_nLtime = $res['FECodeU_LTime'];
            $this->m_nPoint = $res['FECodeU_Point'];
            $this->m_nExp = $res['FECodeU_Exp'];
            $this->m_dReg = $res['FECodeU_Reg'];

            return true;
        }
        else
        {
            return false;
        }
    }

    function    DisplayInfo( )
    {

    }

    function    UpdateInfo( )
    {
        $str = " UPDATE tb_FECode_User SET tb_FECode_User='$this->m_strPwd' , FECodeU_Name='$this->m_strName' , FECodeU_Photo='$this->m_strPhoto' , FECodeU_Sign='$this->m_strSign' , FECodeU_LTime=$this->m_nLtime , FECodeU_Point=$this->m_nPoint , FECodeU_Exp=$this->m_nExp WHERE FECodeU_User='$this->m_strUser'";

        if( $this->SQL_Query($str) )
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