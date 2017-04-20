<?php 
require_once( dirname(__FILE__)."/../base/SqlConnect.php");

class CAdminAdmin extends SqlConnect
{
    protected $m_aUserList;
    protected $m_nUserNum;

    protected $m_nPageSize;
    protected $m_nPage;

    protected $m_nRcount;
    protected $m_nPcount;

    function __construct()
    {
        parent::__construct();
        $this->m_nUserNum = 0;

        $this->m_nPageSize = 5;
        $this->m_nPage = 1;
    }

    function    GetAllAdminInfo( $page )
    {
        $str = "SELECT count(FECodeA_User) FROM tb_FECode_Admin ";

        $this->SQL_Query( $str );

        $row = $this->SQL_Fetch_Row( );
        $this->m_nRcount = $row[0];
        $this->m_nPcount = ceil($this->m_nRcount/$this->m_nPageSize );

        $str = "SELECT * FROM tb_FECode_Admin LIMIT ".($page-1)*$this->m_nPageSize.",".$this->m_nPageSize;

        $this->m_nUserNum = 0;

        $this->SQL_Query( $str );

        while ($res = $this->SQL_Fetch_Assoc() ) 
        {
            $this->m_aUserList[$this->m_nUserNum]['id'] = $res['FECodeA_User'];
            $this->m_aUserList[$this->m_nUserNum]['pwd'] = $res['FECodeA_Pwd'];
            $this->m_aUserList[$this->m_nUserNum]['pow'] = $res['FECodeA_Pow'];

            $this->m_nUserNum++;
        }

        return $this->m_aUserList;
    }

    function    GetResultNum( )
    {
        return $this->m_nUserNum;
    }

    function    GetPCount( )
    {
        return $this->m_nPcount;
    }        

    function    DeleteAdminInfo( $id )
    {
        $str = "DELETE FROM tb_FECode_Admin WHERE FECodeA_User='$id' ";

        if ($this->SQL_Query($str)) 
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
