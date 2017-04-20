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

require_once(dirname(__FILE__)."/../../class/fun/CTask.php");

if (isset( $_GET['page']) && (int)$_GET['page']>0) 
{
    $page = $_GET['page'];
}
else
{
    $page=1;
}

$ct = new CTask( );

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
                <th>Day</th>
                <th>标题</th>
                <th>编辑</th>
            </tr>
        </thead>
        <tbody>

<?php
    $res = $ct->GetAllTask( $page );
    $n = $ct->GetResultSize( );  

    for( $i=0 ; $i<$n ; $i++ )
    {
        $id = $res[$i]['id'];
        $title = $res[$i]['title'];
        $time = $res[$i]['time'];

        print<<<EOT
            <tr>
                <td>{$time}</td>
                <td>{$title}</td>
                <td>
                    <a href="#">
                        <i class="iconfont icon-mes"></i>编辑
                    </a>
                    <a href="DelTask.php?id={$id}">
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
    
    $p = $ct->GetPCount( );

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
