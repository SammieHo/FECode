<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>课程导航栏</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="x5-page-mode" content="app" />
    <meta name="browsermode" content="application">
    <meta name="format-detection" content="telephone=no" />
    <!-- External CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/position.css">
    <link rel="stylesheet" href="../assets/css/layout.css">
    <link rel="stylesheet" href="../assets/css/border.css">
    <link rel="stylesheet" href="../assets/css/iconfont.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="stylesheet" href="//at.alicdn.com/t/font_80vfkeqzpd620529.css"> -->
</head>
<?php 
require_once( dirname(__FILE__)."/../class/fun/CVideo.php");

if( isset($_GET['class']) )
{
    $class = $_GET['class'];
}
else
{

}
$cv = new CVideo( );
 ?>

<body>
    <div id="app">
        <header class="search-bar col-12 row flex justify-between items-center">
            <b>HTML/CSS</b>
            <form action="" class="inline-block">
                <label class="relative">
                    <i class="iconfont icon-search"></i>
                    <input type="text" placeholder="搜索" class="border-none">
                </label>
            </form>
        </header>
        <!-- tab -->
        <ul class="tab flex justify-around">
            <li class="relative" :class="tab == 1 ? 'active' : ''" v-on:click=" tab = 1 ">
                全部
            </li>
            <li class="relative" :class="tab == 2 ? 'active' : ''" v-on:click=" tab = 2 ">基础</li>
            <li class="relative" :class="tab == 3 ? 'active' : ''" v-on:click=" tab = 3 ">提高</li>
        </ul>
        <!-- 全部 -->

<?php 
        $res = $cv->GetAllVideo( -1 , $class , -1);
        $n = $cv->GetVideoNum();
        for( $i=0 ; $i<$n ; $i++ )
        {
            print<<<EOT
            <section v-if="tab == 1" class="course-list">
            <div class="border-bottom course-list-block flex justify-between" v-for="i in 1">
                <a href="courseDetail.php?id={$res[$i]['id']}" class="block">
                    <img src="../photo/{$res[$i]['photo']}" alt="" class="course-img">
                    <div>
                        <div class="course-title">
                            {$res[$i]['title']}
                        </div>
                        <div class="course-icon">
                            <span>{$res[$i]['click']}</span>
                            <span>{$res[$i]['time']}</span>
                        </div>
EOT;
            if( $res[$i]['level']==0 )
            {
                        echo "<a class=\"btn\">基础</a>";
            }
            else
            {
                        echo "<a class=\"btn\">提高</a>";
            }

            echo "
                    </div>
                </a>
            </div>
        </section>";

        }
 ?>

        <!-- 基础 -->
<?php 
        $res = $cv->GetAllVideo( -1 , $class , 0);
        $n = $cv->GetVideoNum();

        for( $i=0 ; $i<$n ; $i++ )
        {
            print<<<EOT
            <section v-if="tab == 2" class="course-list">
            <div class="border-bottom course-list-block flex justify-between" v-for="i in 1">
                <a href="courseDetail.php?id={$res[$i]['id']}" class="block">
                    <img src="../photo/{$res[$i]['photo']}" alt="" class="course-img">
                    <div>
                        <div class="course-title">
                            {$res[$i]['title']}
                        </div>
                        <div class="course-icon">
                            <span>{$res[$i]['click']}</span>
                            <span>{$res[$i]['time']}</span>
                        </div>
EOT;
            if( $res[$i]['level']==0 )
            {
                        echo "<a class=\"btn\">基础</a>";
            }
            else
            {
                        echo "<a class=\"btn\">提高</a>";
            }

            echo "
                    </div>
                </a>
            </div>
        </section>";

        }
 ?>
        <!-- 提高 -->
<?php 
        $res = $cv->GetAllVideo( -1 , $class , 1);
        $n = $cv->GetVideoNum();

        for( $i=0 ; $i<$n ; $i++ )
        {
            print<<<EOT
            <section v-if="tab == 3" class="course-list">
            <div class="border-bottom course-list-block flex justify-between" v-for="i in 1">
                <a href="courseDetail.php?id={$res[$i]['id']}" class="block">
                    <img src="../photo/{$res[$i]['photo']}" alt="" class="course-img">
                    <div>
                        <div class="course-title">
                            {$res[$i]['title']}
                        </div>
                        <div class="course-icon">
                            <span>{$res[$i]['click']}</span>
                            <span>{$res[$i]['time']}</span>
                        </div>
EOT;
            if( $res[$i]['level']==0 )
            {
                        echo "<a class=\"btn\">基础</a>";
            }
            else
            {
                        echo "<a class=\"btn\">提高</a>";
            }

            echo "
                    </div>
                </a>
            </div>
        </section>";

        }
 ?>
        <!-- footer -->
        <footer class="footer-bar fixed-bottom col-12">
            <ul class="flex justify-between">
                <li class="col-3 text-center">
                    <a href="#" class="block">
                        <i class="sprite sprite-home"></i>
                        <div class="text">首页</div>
                    </a>
                </li>
                <li class="col-3 text-center">
                    <a href="#" class="block">
                        <i class="sprite sprite-course active"></i>
                        <div class="text">课程</div>
                    </a>
                </li>
                <li class="col-3 text-center">
                    <a href="#" class="block">
                        <i class="sprite sprite-task"></i>
                        <div class="text">任务</div>
                    </a>
                </li>
                <li class="col-3 text-center">
                    <a href="#" class="block">
                        <i class="sprite sprite-mine"></i>
                        <div class="text">我的</div>
                    </a>
                </li>
            </ul>
        </footer>
    </div>
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
