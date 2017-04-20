<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/iconfont.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php 

require_once(dirname(__FILE__)."/../../class/fun/CVideo.php");

if (isset( $_GET['page']) && (int)$_GET['page']>0) 
{
    $page = $_GET['page'];
}
else
{
    $page=1;
}

$cv = new CVideo( );

 ?>
<body>
    <form action="" class="search">
        <label class="relative search-input border-bottom inline-block">
            <input type="text" placeholder="请输入标题 / 关键字" class="border-none">
            <i class="iconfont icon-llhomesearch absolute-top-right icon"></i>
        </label>
        <button type="submit">搜索</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>标题</th>
                <th>类别</th>
                <th>难度</th>
                <th>编辑</th>
            </tr>
        </thead>
        <tbody>
<?php
    $res = $cv->GetAllVideo( $page , "" , -1 ); 
    $num = $cv->GetVideoNum( );

    for( $i=0 ; $i<$num ; $i++ )
    {
        $title = $res[$i]['title'];
        $class = $res[$i]['class'];
        $id = $res[$i]['id'];
        if( $res[$i]['level'] )
        {
            $level = "提高";
        } 
        else
        {
            $level = "基础";  
        }

        print<<<EOT
            <tr>
                <td>{$id}</td>
                <td>{$title}</td>
                <td>{$class}</td>
                <td>{$level}</td>
                <td>
                    <a href="#">
                        <i class="iconfont icon-mes"></i>编辑
                    </a>
                    <a href="DelCourse.php?id={$id}">
                        <i class="iconfont icon-mes"></i>删除
                    </a>
                </td>
            </tr>
EOT;
    }
?>
        </tbody>
    </table>

    <div class="pages">
<?php 
    
    $pre = $page-1;
    $nex = $page+1; 
    if( $page==1 )
    {
        print<<<EOT
            <a href="" class="cancel">上一页</a>
EOT;
    }
    else
    {
        print<<<EOT
        <a href="?page=$pre" >上一页</a>
EOT;
    }
    
    $p = $cv->GetPCount( );

    for( $i=1 ; $i<=$p ; $i++ )
    {
        if( $i==$page )
        {
            print<<<EOT
                <a href="?page={$i}" class="active">{$i}</a>
EOT;
        }
        else
        {
            print<<<EOT
            <a href="?page={$i}">{$i}</a>
EOT;
        }
    }

    if( $page==$p )
    {
        print<<<EOT
            <a href="" class="cancel">下一页</a>
EOT;
    }
    else
    {
        print<<<EOT
        <a href="?page=$nex" >下一页</a>
EOT;
    }
?>
    </div>
</body>

</html>
