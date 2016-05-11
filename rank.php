<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>玩物排行榜</title>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script src="js/jquery-2.2.2.min.js"></script>
    <script src="./layer.m/layer.m.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover {
            background-color:  #036EB8 !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent !important;
        }
        .navbar-default .navbar-toggle .icon-bar {
            background-color:  #ffffff !important;
        }
        textarea{background: none;
            color: grey;
            font-size: 14px;
            word-wrap: break-word;
            border:solid #d3d3d3 2px ;
            border-radius:10px;
            padding: 5px;}
        input{background: none;
            color: grey;
            font-size: 14px;
            word-wrap: break-word;
            border:solid #d3d3d3 2px ;
            border-radius:5px;
            padding: 5px;}
    </style>


</head>

<body>
<div id="bghead">
    <nav class="navbar navbar-default " style="width:100%;background-color:transparent;border-color:transparent;position:absolute;z-index:5">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background-color: #036EB8 !important">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li class="active"><a href="home.php" style="opacity: 0.8;">活动主页</a></li>
                    <li class="active"><a href="rank.php" style="opacity: 0.8;">查看排名</a></li>
                    <li class="active"><a href="share.php?sfrom=1" style="opacity: 0.8;">我的宝贝</a></li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- /.first img -->
    <!--    <img id="son" class=" img-responsive center-block" src="image/upload.jpg"  style="border:solid #5cb85c 4px ;border-radius:10px;position: absolute;z-index: 4;">-->

    <a href="home.php"><img id="father" class=" img-responsive center-block "  src="image/xi-banner.jpg" style="width: 100%;" ></a>



</div>
<div class="row featurette container-fluid " style="margin: 0 10px;">
    <h3 id="fonthead" style="color:#036EB8" class="featurette-heading">
        宝贝玩物人气排名
    </h3>
    <br>
    <?php

    require_once 'connectdb.php';


    if($_conn){

        mysql_select_db('nac',$_conn);
        mysql_query("set names 'utf8' ");
        $result1 = mysql_query("SELECT `imgname`,COUNT(*) FROM vote GROUP BY `imgname` ORDER BY COUNT(*) DESC");
        $result2 = mysql_query("SELECT * FROM vote");
        $votesum = mysql_num_rows($result2);
        $result3 = mysql_query("SELECT * FROM poster");
        $joinsum = mysql_num_rows($result3);
        $result4 = mysql_query("SELECT `imgname`,COUNT(*) FROM vote GROUP BY `imgname` ORDER BY COUNT(*) DESC LIMIT 1");
        $firstsum =mysql_fetch_assoc($result4);



        echo"

    <div class='col-xs-4' style='margin-bottom: 25px'>  <p style='text-align:justify;text-justify:auto;color:#EAA0A0;font-size: 14px;' >总投票数</p><span class='label bg-danger center-block'  style='background-color: #EAA0A0;'>".$votesum."</span> </div>
    <div class='col-xs-4' style='margin-bottom: 25px'>  <p style='text-align:justify;text-justify:auto;color:#EAA0A0;font-size: 14px;' >参展作品</p> <span class='label bg-danger center-block'  style='background-color: #EAA0A0;'>".$joinsum."</span> </div>
    <div class='col-xs-4' style='margin-bottom: 25px'>  <p style='text-align:justify;text-justify:auto;color:#EAA0A0;font-size: 14px;'>最高票数</p> <span class='label bg-danger center-block'  style='background-color: #EAA0A0;'>".$firstsum["COUNT(*)"]."</span> </div>

";

        while($row=mysql_fetch_assoc($result1))//将result结果集中查询结果取出一条
        {
            echo"
 <div class='col-xs-6' style='margin-bottom: 15px'>
       <a href='http://www.thinkout-art.com/femaleworks/share.php?sfrom=2&imgname=".$row["imgname"]. "'>  <img  class=' img-responsive img-circle' src='Uploads/".$row["imgname"]. "'  style='width: 100px; height:100px;'>
    <span class='label bg-danger center-block'  style='background-color: #EAA0A0;'>粉丝：".$row["COUNT(*)"]."</span></a>
        </div>
";}

    }else{
        echo "error";
    }
    ?>
</div>
<br><br>
<div class="row featurette"  style="margin: 0;">

    <div class="col-xs-4"></div>
    <button class="btn btn-danger  disabled col-xs-4 " style="" onclick='window.open("http://www.thinkout-art.com/femaleworks/home.php")'>我要参展</button>
    <div class="col-xs-4"></div>
</div>
<br><br>

<div class="row featurette" style="margin: 0 5px;">

        <div class="col-xs-12" style="padding-left: 30px">
            <!--        <h3 style="color:grey" class="featurette-heading">-->
            <!--            活动信息-->
            <!--        </h3><hr>-->
            <hr>
            <p style="color:#036EB8;font-size: 14px;margin-top:5px; " class="lead">

                | 征集时间： 即日起至4月20日<br><br>
                | 参与方式： 填写个人联系方式，上传玩物照片和140字以内的描述，点击“提交”按钮，然后将投票主页分享到朋友圈，邀请你的小伙伴为你投票~<br><br>
                | 评选方法： 我们将选出投票数的前30名，然后由西安新艺术中心馆长亲自挑选二十件展品邀请上展。<br><br>
                | 征集奖励： <br>
                <span class="label bg-danger" style="background-color: #EAA0A0">艺术奉献奖</span>  凡参与本活动的小伙伴均可获得女性展门票2张<br>
                <span class="label bg-danger"  style="background-color: #EAA0A0">最棒玩物奖</span>  凡被邀请参展的小伙伴均可获得女性展门票2张及1件【嬉】展衍生品<br>

                | 奖品领取： 西安新艺术中心一楼前台，联系方式：029-86105020</p>

        </div>



</div>
<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="image/xi-hr-04.png" alt="Generic placeholder image">
<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="image/map-4-01.jpg" alt="Generic placeholder image">
<footer style="background-color: #EAA0A0">
    <div class="row container-fluid" style="margin: 0">
        <div class="col-xs-10"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="image/xi-footer-02.png" alt="Generic placeholder image" ></div>
        <div class="col-xs-2" style="margin-top: 8px;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257629318'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1257629318%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script> </div>
    </div>
</footer>



</body></html>