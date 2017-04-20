<?php 
require_once( dirname(__FILE__)."/../base/SqlConnect.php");

/**
* 
*/
class CAdminUser extends SqlConnect
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

    function    GetAllUserInfo( $page )
    {
        $str = "SELECT count(FECodeU_User) FROM tb_FECode_User ";

        $this->SQL_Query( $str );

        $row = $this->SQL_Fetch_Row( );
        $this->m_nRcount = $row[0];
        $this->m_nPcount = ceil($this->m_nRcount/$this->m_nPageSize );

        $str = "SELECT * FROM tb_FECode_User LIMIT ".($page-1)*$this->m_nPageSize.",".$this->m_nPageSize;

        $this->m_nUserNum = 0;

        $this->SQL_Query( $str );

        while ($res = $this->SQL_Fetch_Assoc() ) 
        {
            $this->m_aUserList[$this->m_nUserNum]['id'] = $res['FECodeU_User'];
            $this->m_aUserList[$this->m_nUserNum]['pwd'] = $res['FECodeU_Pwd'];
            $this->m_aUserList[$this->m_nUserNum]['name'] = $res['FECodeU_Name'];

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

    function    DeleteUserInfo( $id )
    {
        $str = "DELETE FROM tb_FECode_User WHERE FECodeU_User='$id' ";

        if ($this->SQL_Query($str)) 
        {
             return true;
         } 
         else
         {
            return false;
         }
    }

    function    UpdateUserInfo( $id , $name , $pwd )
    {
        $str = "UPDATE tb_FECode_User SET FECodeU_Name='$name' , FECodeU_Pwd='$pwd' WHERE FECodeU_User='$id'";

        if ($this->SQL_Query($str)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function    GetUserByName( $name )
    {
        $str = "SELECT * FROM tb_FECode_User WHERE FECodeU_Name='$name'";

        $this->m_nUserNum = 0;

        $this->SQL_Query( $str );

        while ($res = $this->SQL_Fetch_Assoc() ) 
        {
            $this->m_aUserList[$this->m_nUserNum]['id'] = $res['FECodeU_User'];
            $this->m_aUserList[$this->m_nUserNum]['pwd'] = $res['FECodeU_Pwd'];
            $this->m_aUserList[$this->m_nUserNum]['Name'] = $res['FECodeU_Name'];

            $this->m_nUserNum++;
        }

        return $this->m_aUserList;
    }
}

 ?>