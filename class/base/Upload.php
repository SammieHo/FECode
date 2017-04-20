<?php 

class Upload
{
    static function MakeFileName( $str )
    {
        $cnt = getdate();
        $ext = pathinfo( $str['name'],PATHINFO_EXTENSION );
        $fname = $cnt['year'].$cnt['mon'].$cnt['mday'].$cnt['hours'].$cnt['minutes'].$cnt['seconds'].mt_rand().'.'.$ext;

        return array('FileName'=>$fname,'Ext'=>$ext);
    }

    static function UploadFile( $path , $file )
    {
        if($file['error']==0) 
        {
            $n_FileInfo = Upload::MakeFileName($file);
            $n_FileName=$n_FileInfo['FileName'];
            $n_FileType=$n_FileInfo['Ext'];

                move_uploaded_file($file['tmp_name'], $path.$n_FileName);

            return $n_FileName;
        }    
        else
        {
            return false;
        }
    }
}

 ?>