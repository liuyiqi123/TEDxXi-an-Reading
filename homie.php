<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vicky
 * Date: 2016/3/30
 * Time: 16:14
 */
session_start();

if(isset($_SESSION['open'])) {
    $ac = $_SESSION['open'];
}elseif(isset($_COOKIE['open'])){
    $ac = $_COOKIE['open'];
}elseif(isset($_GET['open'])){
    $ac = $_GET['open'];
}else{
//    echo "nosession";
        echo  '<script language="javascript">location.href="login.php?";</script>';
}
require_once 'connectdb.php';

if($_conn){
    mysql_select_db('nac',$_conn);
    mysql_query("set names 'utf8' ");
//        $ac = $_GET['server_tmp'];
    $result =  mysql_query("SELECT * FROM users where openid='$ac'");
//         根据 微信ID
    $result_arr = mysql_fetch_assoc($result);
    if (!empty($result_arr)){
        $user_tel=$result_arr['tel'];
        $user_cardnum=$result_arr['cardnum'];
        $user_headimg=$result_arr['headimg'];
        $user_nickname=$result_arr['nickname'];
        $_SESSION['tel']= $user_tel;
        $_SESSION['headimg']= $user_headimg;
        $_SESSION['nick']= $user_nickname;
        $_SESSION['open']= $result_arr['openid']; }else{
        echo  '<script language="javascript">location.href="login.php?";</script>'; exit;
    }
    $sessionId = session_id();
    $lifeTime = 365 * 24 * 3600;
    setcookie('open',$ac,  time() + $lifeTime, "/");
    setcookie('nick',$user_nickname,  time() + $lifeTime, "/");
    setcookie('head',$user_headimg,  time() + $lifeTime, "/");

}else{

    echo  mysql_error();
}
//?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>我要参展</title>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script src="js/jquery-2.2.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.form.js"></script>
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

    <img id="father" class=" img-responsive center-block "  src="image/xi-banner.jpg" style="width: 100%;" >



</div>

<div class="container-fluid"  id="loaddiv" style="width:100%;background:rgba(0,0,0,0.5);position: absolute;z-index:9999;">
    <div class="progress" style="margin:300px 0 600px 0;" >
        <div class="progress-bar progress-bar-success progress-bar-striped active" id='load' role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
          上传中...
        </div>
    </div></div>

<!-- /.first description -->
<div class="row featurette container-fluid " style="margin: 0 10px;">

    <h4 id="fonthead" style="color:grey" class="featurette-heading">
       玩物征集 <br><br>
        <strong>  <span style="color: #EAA0A0 ">Ta</span></strong> + <strong><span style="color:#036EB8 ">回忆</span> </strong> + <strong><span style="color:#EAA0A0 ">艺术家们</span> </strong> =  <strong>  <span style="color: #036EB8 ">NAC</span></strong> <strong><span style="color:#EAA0A0 ">【嬉】</span> </strong>  <br>
    </h4>
    <form method="post" id="join"  name='join' enctype="multipart/form-data" action="worksupload.php">
    <p>我的玩物：<span style="color:##EAA0A0">(请上传2M以内jpg\png格式图片)</span><input type="file" form="join" name="imgfile" id="imgfile" /></p>
    <p>我的称呼：<input type="text" form="join" id="realname" name="realname" value="<?php echo $user_nickname;?>"></p>
    <p>我的联系方式：<input type="tel"  form="join" id="tel" name="tel"  value="<?php echo $user_tel;?>" onfocus="if(value=='请输入手机号码'){value=''}"
                     onblur="if (value ==''){value='请输入手机号码'}"></p>
                    <input type="text" form="join" id="openid" name="openid"  style="display: none"  value="<?php echo $ac;?>"  >

    <textarea name='story' maxlength="140"  id="story"  form="join" rows="8"  onfocus="if(value=='我和ta的故事，限140字哦~'){value=''}"
              onblur="if (value ==''){value='我和ta的故事，限140字哦~'}">请输入内容，限140字哦~</textarea>

    <button class="btn  btn-danger disabled btn-block" id='submit' type="button" style="margin-top:10px; " >提交</button>

    </form>

</div>

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
            <span class="label bg-danger"  style="background-color: #EAA0A0">艺术奉献奖</span>  凡参与本活动的小伙伴均可获得女性展门票2张<br>
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
</body>
<script type="text/javascript">

    window.onload=function(){
//        var wd= $("#bghead").outerWidth()*0.6;
//        var bg_son=document.getElementById("son");
//        var xx= $("#bghead").outerWidth()*0.2;
//        var yy= $("#bghead").outerHeight()*0.25;
        var bg_story=document.getElementById("story");
//        bg_son.style.left=xx+"px";
//        bg_son.style.width=wd+"px";
//        bg_son.style.top=yy+"px";
        bg_story.style.width=$("#fonthead").outerWidth()+'px';
    };

    $(document).ready(function(){
        $('#loaddiv').hide();

    });

    $('#submit').click(function() {
        $('#loaddiv').show();
        $('#load').animate({'width': '43%'}, "slow", "linear");


        $('#join').ajaxSubmit({

            type:'post',
            url:'worksupload.php',
            beforeSend:function()
            {   $('#loaddiv').show();
                $('#load').animate({'width': '89%'},3000, "linear");
            },
            success: function (data) {
                console.log(data);

                window.location.href='inform.php';
            },
            error: function (XmlHttpRequest, textStatus, errorThrown) {
                console.log(XmlHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    });




</script>


</html>