<?php
include("head.html");
error_reporting(0);

require_once ('config.php');

session_start();

if(isset($_SESSION['open'])) {
    $open = $_SESSION['open'];
}elseif(isset($_COOKIE['open'])){
    $open = $_COOKIE['open'];
}else{
//    echo "nosession";
    echo  '<script language="javascript">location.href="login.php?";</script>';
}
require_once 'connectdb.php';

if($_conn){
    mysql_select_db('test',$_conn);
    mysql_query("set names 'utf8' ");
//        $ac = $_GET['server_tmp'];
    $result =  mysql_query("SELECT * FROM users where openid='$open'");
    $result_arr = mysql_fetch_assoc($result);

    $result2 =  mysql_query("SELECT * FROM reader where openid='$open'");
    $result_arr2 = mysql_fetch_assoc($result2);
    if (!empty($result_arr)){

        $user_headimg=$result_arr['headimg'];
        $user_nickname=$result_arr['nickname'];
        $_SESSION['headimg']= $user_headimg;
        $_SESSION['nick']= $user_nickname;
        $_SESSION['open']= $result_arr['openid'];
        $sessionId = session_id();
        $lifeTime = 365 * 24 * 3600;
        setcookie('open',$open,  time() + $lifeTime, "/");
        setcookie('nick',$user_nickname,  time() + $lifeTime, "/");
        setcookie('head',$user_headimg,  time() + $lifeTime, "/");


    }elseif(!empty($result_arr2)){

        $user_headimg=$result_arr2['headimg'];
        $user_nickname=$result_arr2['nickname'];
        $_SESSION['headimg']= $user_headimg;
        $_SESSION['nick']= $user_nickname;
        $_SESSION['open']= $result_arr2['openid'];
        $sessionId = session_id();
        $lifeTime = 365 * 24 * 3600;
        setcookie('open',$open,  time() + $lifeTime, "/");
        setcookie('nick',$user_nickname,  time() + $lifeTime, "/");
        setcookie('head',$user_headimg,  time() + $lifeTime, "/");


    }else{


        echo  '<script language="javascript">location.href="login.php?";</script>'; exit;
    }



}else{

echo  mysql_error();}


?>


<body xmlns="http://www.w3.org/1999/html">
<!--slider-->
<div class="pageslider">
<!--      logo-->

<!--page1-->
    <div class="row container" id="page1" style="margin-top: 10px;display: block">
        <div class="row container" style="margin-top: 10px">
            <img src="image/tedlogo.png" class="img-responsive" style=" width: 50%;left: 20px;margin: 5px">
        </div>
        <img src="image/page1.png" class="img-responsive">
        <img src="image/up.png" class="img-responsive upupup" style=" width:24px;bottom: 20px;position: fixed;left:48%">
    </div>
<!--    page2-->
    <div class="row container" id="page2" style="margin-top: 10px;display: none">
        <div class="row container" style="margin-top: 10px">
            <img src="image/tedlogo.png" class="img-responsive" style=" width: 50%;left: 20px;margin: 5px">
        </div>
        <img src="image/page2.png" class="img-responsive">
        <img src="image/up.png" class="img-responsive upupup" style=" width:24px;bottom: 20px;;position: fixed;left:48%">
    </div>
<!--    page3-->
    <div class="row container" id="page3" style="margin-top: 10px;display: none">
        <div class="row container" style="margin-top: 10px">
            <img src="image/tedlogo.png" class="img-responsive" style=" width: 50%;left: 20px;margin: 5px">
        </div>
        <img src="image/page3.png" class="img-responsive">
        <img src="image/testbtn.png" class="img-responsive rule" style=" width:50%;margin-bottom: 20px">
        <img src="image/pagebtn.png" class="img-responsive pagebtn upup" style=" width:50%;position: fixed">
    </div>


    <!--    page4-->

    <div class="row container" id="page4" style="margin-top: 10px;display: none">
        <div class="row container" style="margin-top: 10px">
            <img src="image/tedlogo.png" class="img-responsive " style=" width: 50%;left: 20px;margin: 5px;float: left">
            <img src="image/rulebtn.png" class="img-responsive  rule" style=" width: 20%;margin: 5px;float: right">
        </div>
        <img src="image/rule.png" class="img-responsive">
    </div>
</div>





<!--主题-->
<div class="pagemain" style="display: none">

    <div class="row container" style="margin-top: 10px">
       <img src="image/cover1.png" class="img-responsive">
    </div>

<div class="row container" style="margin-top: 10px">
    <img src="image/urlbook.png" class="img-responsive" id="urlbook" style="width:36%;margin: auto">
</div>


<!--进度-->

<div class="row container" style="margin-bottom: 60px">

    <?php
    $resultreader = mysql_query("SELECT `nickname`,`headimg`,COUNT(*) FROM submit GROUP BY `headimg` ORDER BY COUNT(*) DESC");

    while($row=mysql_fetch_assoc($resultreader))//将result结果集中查询结果取出一条
    {

        echo"
<div class='media col-xs-12 ' style='margin-top: 20px;'>

        <div class='media-left' >
            <div class='readerimg''>
            <img class='media-object '  alt='80x80' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 80px; height: 80px; padding: 10px'>
            </div>
        </div>
        <div class='media-body' style='padding-top: 1em;'>
            <h4 class='media-heading' style='color: #ffffff' >".$row["nickname"]. "</h4>
            <h4 class='media-heading' style='color: #ffffff'>".$row["COUNT(*)"]."0%</h4>

                <div class='progress'  >
                    <div class='progress-bar progress-bar-success '  role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: ".$row["COUNT(*)"]."0%;'>


                </div></div>
        </div>

</div>
    ";


    }


    ?>



</div>


<!--评论-->
<div class="row container" style="margin-top: 10px">
    <img src="image/weiguan.png" class="img-responsive"  style="width:40%;margin: auto;margin-bottom: 20px">
    <img src="image/saysomething.png" data-toggle="modal" data-target=".bs-example-modal-sm" class="img-responsive"  style="width:36%;margin: auto">
<!--    <button  type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm">写评论</button>-->

</div>

<div class="row container "  style="margin-bottom: 60px">
<!--    <div class="col-xs-6"><button  type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm">写评论</button> </div>-->


    <?php

    require_once 'connectdb.php';


    if($_conn){

        mysql_select_db('test',$_conn);
        mysql_query("set names 'utf8' ");
        $resultc = mysql_query("SELECT * FROM coment");



        while($row=mysql_fetch_assoc($resultc))//将result结果集中查询结果取出一条
        {
            echo"
<div class='media col-xs-12 ' style='margin-top: 20px;'>
            <div class='media-left' >
                <img class='media-object img-circle'  alt='100x100' src='".$row["headimg"]. "' data-holder-rendered='true' style='width: 40px; height: 40px;'>
            </div>
            <div class='media-body' style='padding-top: 1em;'>
                <p class='media-heading' style='color:white;' >".$row["nickname"]."<br>
                 ".$row["coment"]."</p>

                </div>
            </div>
";}

    }else{
        echo "error";
    }
    ?>




</div>



<!-- Modal -->

<div class="modal fade bs-example-modal-sm" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">评论</h4>
        </div>
        <div class="modal-body">
            <form name="coment" action="coment.php" id="coment" enctype="multipart/form-data"  method="post">

                    <textarea  maxlength="50"  id='text' class="form-control" rows="3" name="coment" form="coment" onfocus="if(value=='限40字哦~'){value=''}"
                              onblur="if (value ==''){value='限40字哦~'}"></textarea>
                    <input type="text"  name="useropen" form="coment" value="<?php echo $open; ?>" style="display: none" >
                    <input type="text"  name="userimg" form="coment" value="<?php echo $user_headimg; ?>" style="display: none" >
                    <input type="text"  name="usernick" form="coment" value="<?php echo $user_nickname; ?>" style="display: none">


            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary" id="submit" >提交</button>
        </div>
        </div>
    </div>
</div>


</div>


<!---->
<!--<div class="row container" >-->
<!--    <nav>-->
<!--        <ul class="pagination">-->
<!--            <li>-->
<!--                <a href="#" aria-label="Previous">-->
<!--                    <span aria-hidden="true">«</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li><a href="#">1</a></li>-->
<!--            <li><a href="#">2</a></li>-->
<!--            <li><a href="#">3</a></li>-->
<!--            <li><a href="#">4</a></li>-->
<!--            <li><a href="#">5</a></li>-->
<!--            <li>-->
<!--                <a href="#" aria-label="Next">-->
<!--                    <span aria-hidden="true">»</span>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->
<!--</div>-->
</body>
<script>
    $("#submit").click(
        function(){
            $('#coment').ajaxSubmit({
                type:'post',
                url:'coment.php',
                success: function (data) {
                    $("#mymodal").modal("hide");

                },
                error: function (XmlHttpRequest, textStatus, errorThrown) {
                    alert(XmlHttpRequest);
                    alert(textStatus);
                    alert(errorThrown);
        }
            });
        }
    );

    $("#urlbook").click(function () {
        window.location.href="books.php";
    });


    $("#page1").swipe({
        swipeUp:function(event   ) {
            $("#page1").hide();
            $("#page2").show();

        }

      }

    );

    $("#page2").swipe({
            swipeUp:function(event   ) {
                $("#page2").hide();
                $("#page3").show();

            }

        }

    );


    $("#page3").swipe({
            swipeUp:function(event   ) {
                $("#page3").hide();
                $(".pagemain").show();

            }

        }

    );

    $(".pagebtn").click(
        function(){
            $("#page3").hide();
            $(".pagemain").show();
        }
    );

    var direction='right';
    (function(){
        var css={
            'left':'24%'
        };
        if(direction==='right'){
            direction='left';
            css.left='26%';
        }else{
            direction='right';
        }
        $('.upup').animate(css,arguments.callee);
    })();



    $(".rule").click(function () {
        $("#page3").toggle();
        $("#page4").toggle()
    });

    $(document).ready(function () {
        var seth= window.screen.height-20;
        $("#page1").height(seth);
        $("#page2").height(seth);
        $("#page3").height(seth);

    })

</script>
</html>