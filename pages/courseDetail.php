<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>课程导航栏</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="x5-page-mode" content="app"/>
    <meta name="browsermode" content="application">
    <meta name="format-detection" content="telephone=no" />
    <!-- External CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/position.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/border.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link rel="stylesheet" href="../assets/css/iconfont.css">
    <link rel="stylesheet" href="../assets/css/color.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="stylesheet" href="//at.alicdn.com/t/font_80vfkeqzpd620529.css"> -->
</head>

<?php 

require_once(dirname(__FILE__)."/../class/fun/CVideo.php");

if(isset($_GET['id']) )
{
    $id = $_GET['id'];
    $cv = new CVideo( );
}
else
{

}


 ?>

<body>
    <div id="app" class="course-detail">
        <div class="header bg-blue row">
            <a href="#" class="inline-block return">
                <i class="iconfont icon-fanhui"></i>返回
            </a>
<?php 
        $res = $cv->GetItemVideo( $id );

        print<<<EOT
            <h3 class="second-line">{$res[0]['title']}</h3>
EOT;
 ?>
            

            <div class="des">
            <?php  
            print<<<EOT
                学习人数：<span>{$res[0]['click']}</span>&nbsp;&nbsp;
EOT;
            ?>

            <?php  

            if( $res[0]['level']==0 )
            {
                echo "难度级别：<span>基础</span>";
            }
            else
            {
                echo "难度级别：<span>提高</span>";
            }
            ?>
            </div>
        </div>

        <section class="course-info border-bottom container">
            <h3>课程简介</h3>
            <p class="margin-3">
                <?php
                    echo $res[0]['desc']; 
                 ?>
            </p>
        </section>


    </div>

    <footer class="fixed-bottom block col-12 fixed-btn">
    <?php  
        print<<<EOT
            <a href="video.php?id={$id}" class="block text-center">开始学习</a>
EOT;

    ?>
    </footer>

    <script src="../assets/js/vue.js"></script>
    <script>
    let app = new Vue({
        el: '#app',
        data: {
            tab: 1
        },
        method() {

        },
        computed: {

        }
    });
    </script>
</body>

</html>