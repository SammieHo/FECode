<?php 
require_once( dirname(__FILE__)."/../base/SqlConnect.php");
require_once( dirname(__FILE__)."/../base/Upload.php");
class CVideo extends SqlConnect
{
    protected $m_id;
    protected $m_title;
    protected $m_desc;
    protected $m_photo;
    protected $m_addr;
    protected $m_click;
    protected $m_time;

    protected $m_aVideoList;
    protected $m_nVideoListNum;

    protected $m_nRCount;
    protected $m_nPCount;
    protected $m_nPageSize;

    function    __construct( )
    {
        parent::__construct( );
        $this->m_nVideoListNum = 0;
        $this->m_nPageSize = 5;
    }

    function    GetAllVideo( $page , $class , $level )
    {
        if( $page>0 )
        {
            $str = "SELECT count(FECodeV_ID) FROM tb_FECode_Video ";
            $this->SQL_Query( $str );
            $row = $this->SQL_Fetch_Row( );
            $this->m_nRCount = $row[0];

            $this->m_nPCount = ceil($this->m_nRCount/$this->m_nPageSize );

            $str = "SELECT * FROM tb_FECode_Video LIMIT ".($page-1)*$this->m_nPageSize.",".$this->m_nPageSize;
        }

        if (!empty($class)) 
        {
            $str = "SELECT * FROM tb_FECode_Video WHERE FECodeV_Class='$class' ";
        }

        if ($level>=0) 
        {
            $str = "SELECT * FROM tb_FECode_Video WHERE FECodeV_Level=$level ";
        }
        
        if( !empty( $class ) && $level>=0 )
        {
            $str = "SELECT * FROM tb_FECode_Video WHERE FECodeV_Level=$level AND FECodeV_Class='$class'";
        }

        $this->m_nVideoListNum = 0;

        $this->SQL_Query( $str );

        while ( $res=$this->SQL_Fetch_Assoc() )
        {
            $this->m_aVideoList[$this->m_nVideoListNum]['id'] = $res['FECodeV_ID'];
            $this->m_aVideoList[$this->m_nVideoListNum]['title'] = $res['FECodeV_Title'];
            $this->m_aVideoList[$this->m_nVideoListNum]['desc'] = $res['FECodeV_Desc'];
            $this->m_aVideoList[$this->m_nVideoListNum]['photo'] = $res['FECodeV_Photo'];
            $this->m_aVideoList[$this->m_nVideoListNum]['addr'] = $res['FECodeV_Addr'];
            $this->m_aVideoList[$this->m_nVideoListNum]['click'] = $res['FECodeV_Click'];
            $this->m_aVideoList[$this->m_nVideoListNum]['time'] = $res['FECodeV_Time'];
            $this->m_aVideoList[$this->m_nVideoListNum]['class'] = $res['FECodeV_Class'];
            $this->m_aVideoList[$this->m_nVideoListNum]['level'] = $res['FECodeV_Level'];
            $this->m_nVideoListNum++;
        }
        return $this->m_aVideoList;
    }

    function    GetItemVideo( $id )
    {
        $str = "SELECT * FROM tb_FECode_Video WHERE FECodeV_ID=$id ";

        $this->SQL_Query( $str );

        if( $res=$this->SQL_Fetch_Assoc() )
        {
            $this->m_aVideoList[0]['id'] = $res['FECodeV_ID'];
            $this->m_aVideoList[0]['title'] = $res['FECodeV_Title'];
            $this->m_aVideoList[0]['desc'] = $res['FECodeV_Desc'];
            $this->m_aVideoList[0]['photo'] = $res['FECodeV_Photo'];
            $this->m_aVideoList[0]['addr'] = $res['FECodeV_Addr'];
            $this->m_aVideoList[0]['click'] = $res['FECodeV_Click'];
            $this->m_aVideoList[0]['time'] = $res['FECodeV_Time'];
            $this->m_aVideoList[0]['class'] = $res['FECodeV_Class'];
            $this->m_aVideoList[0]['level'] = $res['FECodeV_Level'];

            return $this->m_aVideoList;            
        }
        else
        {
            return false;
        }
    }

    function    InsertVideo( $title , $desc , $photo , $addr , $class , $level )
    {
        if (!empty($photo)) 
        {
            $Ppath = Upload::UploadFile("../../photo/" , $photo );
        }
        else
        {
            $Ppath = "";
        }

        if (!empty($addr)) 
        {
            $Vpath = Upload::UploadFile("../../video/" , $addr );
        }
        else
        {
            $Vpath = "";
        }

        $str = "INSERT INTO tb_FECode_Video( FECodeV_Title , FECodeV_Desc , FECodeV_Photo , FECodeV_Addr ,FECodeV_Click , FECodeV_Time , FECodeV_Class , FECodeV_Level ) VALUES( '$title' , '$desc' , '$Ppath' , '$Vpath' , 0 , now() , '$class' , $level ) ";

        if ($this->SQL_Query($str)) 
        {
            return true;
        }
        else
        {
            echo "$str";
            return false;
        }
    }

    function    DeleteVideo( $id )
    {
        $str = "DELETE FROM tb_FECode_Video WHERE FECodeV_ID=$id ";

        if ($this->SQL_Query($str)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function    GetPCount( )
    {
        return $this->m_nPCount;
    }

    function    GetVideoNum( )
    {
        return $this->m_nVideoListNum;
    }
}



 ?>