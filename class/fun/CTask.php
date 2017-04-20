<?php 
require_once(dirname(__FILE__).'/../base/SqlConnect.php');
require_once(dirname(__FILE__).'/../base/Upload.php');
/**
* 
*/
class CTask extends SqlConnect
{
    protected $m_nID;
    protected $m_strTitle;
    protected $m_strDesc;
    protected $m_strPhoto;
    protected $m_nCount;
    protected $m_dTime;

    protected $m_aResultList;
    protected $m_nResultNum;

    protected $m_nPageSize;
    protected $m_nPCount;
    protected $m_nRCount;
    
    function __construct( )
    {
        parent::__construct( );
        $this->m_nResultNum = 0;
        $this->m_nPageSize = 5;
    }

    function    GetAllTask( $page )
    {
        if ( $page<0 ) 
        {
            $str = "SELECT * FROM tb_FECode_Task ";    
        }
        else
        {
            $str = "SELECT count(FECodeT_ID) FROM tb_FECode_Task ";
            $this->SQL_Query( $str );
            $row = $this->SQL_Fetch_Row( );
            $this->m_nRCount = $row[0];

            $this->m_nPCount = ceil($this->m_nRCount/$this->m_nPageSize );

            $str = "SELECT * FROM tb_FECode_Task LIMIT ".($page-1)*$this->m_nPageSize.",".$this->m_nPageSize;            
        }
        
        

        $this->m_nResultNum = 0;

        $this->SQL_Query( $str );

        while ( ($res=$this->SQL_Fetch_Assoc() ) ) 
        {
            $this->m_aResultList[$this->m_nResultNum]['id'] = $res['FECodeT_ID'];
            $this->m_aResultList[$this->m_nResultNum]['title'] = $res['FECodeT_Title'];
            $this->m_aResultList[$this->m_nResultNum]['desc'] = $res['FECodeT_Desc'];
            $this->m_aResultList[$this->m_nResultNum]['photo'] = $res['FECodeT_Photo'];
            $this->m_aResultList[$this->m_nResultNum]['count'] = $res['FECodeT_Count'];
            $this->m_aResultList[$this->m_nResultNum]['time'] = $res['FECodeT_Time'];

            $this->m_nResultNum++;
        }

        return $this->m_aResultList;
    }

    function    GetItemTask( $id )
    {
        $str = "SELECT * FROM tb_FECode_Task WHERE FECodeT_ID='$id' ";

        $this->SQL_Query( $str );

        while ( ($res=$this->SQL_Fetch_Assoc() ) ) 
        {
            $this->m_aResultList[0]['id'] = $res['FECodeT_ID'];
            $this->m_aResultList[0]['title'] = $res['FECodeT_Title'];
            $this->m_aResultList[0]['desc'] = $res['FECodeT_Desc'];
            $this->m_aResultList[0]['photo'] = $res['FECodeT_Photo'];
            $this->m_aResultList[0]['count'] = $res['FECodeT_Count'];
            $this->m_aResultList[0]['time'] = $res['FECodeT_Time'];
        }

        return $this->m_aResultList;   
    }

    function    GetResultSize( )
    {
        return $this->m_nResultNum;
    }

    function    InsertTask( $title , $desc , $photo )
    {
        if (!empty($photo)) 
        {
            $path = Upload::UploadFile("../../photo/" , $photo );
        }
        else
        {
            $path = "";
        }
        $str = "INSERT INTO tb_FECode_Task( FECodeT_Title , FECodeT_Desc , FECodeT_Photo , FECodeT_Count ,FECodeT_Time ) VALUES( '$title' , '$desc' , '$path' , 0 , now())";

        if( $this->SQL_Query($str) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function    DeleteTask( $id )
    {
        $str = "DELETE FROM tb_FECode_Task WHERE FECodeT_ID = $id ";

        if ($this->SQL_Query($str)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function    GetUserSubmit( $user )
    {
        $str = "SELECT * FROM tb_FECode_Submit , tb_FECode_Task WHERE FECodeS_User='$user' AND tb_FECode_Submit.FECodeS_Task=tb_FECode_Task.FECodeT_ID ";

        $this->m_nResultNum = 0;
        $nIndex = 0;

        $this->SQL_Query( $str );

        while( $res = $this->SQL_Fetch_Assoc() )
        {
            $this->m_aResultList[$this->m_nResultNum]['tid'] = $res['FECodeT_ID'];
            $this->m_aResultList[$this->m_nResultNum]['title'] = $res['FECodeT_Title'];
            $this->m_aResultList[$this->m_nResultNum]['desc'] = $res['FECodeT_Desc'];
            $this->m_aResultList[$this->m_nResultNum]['photo'] = $res['FECodeT_Photo'];
            $this->m_aResultList[$this->m_nResultNum]['count'] = $res['FECodeT_Count'];
            $this->m_aResultList[$this->m_nResultNum]['time'] = $res['FECodeT_Time'];

            $this->m_aResultList[$this->m_nResultNum]['sid'] = $res['FECodeS_ID'];
            $this->m_aResultList[$this->m_nResultNum]['path'] = $res['FECodeS_Path'];
            $this->m_aResultList[$this->m_nResultNum]['stime'] = $res['FECodeS_Time'];

            $this->m_nResultNum++;
        }

        return $this->m_aResultList;
    }


    function    GetPCount( )
    {
        return $this->m_nPCount;
    }

    
}
 ?>