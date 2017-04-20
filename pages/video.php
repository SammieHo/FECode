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
    <link rel="stylesheet" href="../assets/css/video-js.min.css">
    <script src="../assets/js/video.min.js"></script>
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
<!--         <a href="#">
            <i class="iconfont"></i>返回
        </a> -->

        <!-- vedio -->
<?php  
    $res = $cv->GetItemVideo( $id );
    print<<<EOT
        <video id="example_video_1" class="video-js vjs-fill" controls preload="none" width="375" height="100"  poster="../photo/{$res[0]['photo']}">
                <source src="../video/{$res[0]['addr']}" type="video/mp4">
        </video>
EOT;
?>
        <section class="course-info">
            <h3>简介</h3>
            <div>
                <?php 
                    echo $res[0]['desc'];
                 ?>
            </div>
        </section>
    </div>

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
                     <i class="sprite sprite-course"></i>
                     <div class="text">课程</div>
                 </a>
             </li>
             <li class="col-3 text-center">
                 <a href="#" class="block">
                     <i class="sprite sprite-task active"></i>
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