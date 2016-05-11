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
    echo  '<script language="javascript">location.href="rlogin.php?";</script>';
}
require_once 'connectdb.php';

if($_conn){
    mysql_select_db('test',$_conn);
    mysql_query("set names 'utf8' ");
//        $ac = $_GET['server_tmp'];


    $result2 =  mysql_query("SELECT * FROM reader where openid='$open'");
    $result_arr2 = mysql_fetch_assoc($result2);
    if (!empty($result_arr2)){
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


        echo  '<script language="javascript">location.href="rlogin.php?";</script>'; exit;
    }



}else{

echo  mysql_error();}
?>
<body>
<div class="row container" style="margin-top: 10px">
    <img src="image/tedlogo.png" class="img-responsive" style=" width: 50%;left: 20px;margin: 5px">
</div>

<div class="row container" style="margin-top: 10px;margin-left: 15px;margin-right: 15px;">
    <p style="color: white;">1、打卡书籍请勿重复提交，提交后无法修改；<br>2、为避免内容提交失败，上传前备份文字。</p>
    <form name="submit" action="sub.php" id="submit" enctype="multipart/form-data"  method="post">
        <p style="color: white;"> 选择图书：</p>
        <select class="form-control" name="bookid" style="margin-bottom: 10px">
            <option value="1">必然</option>
            <option value="2">与机器人共舞</option>
            <option value="3">思维版图</option>
            <option value="4">上帝掷骰子吗</option>
            <option value="5">查令十字街84号</option>
            <option value="6">你是浪子，别泊岸</option>
            <option value="7">学会提问</option>
            <option value="8">亲密关系</option>
            <option value="9">一头想要被吃掉的猪</option>
            <option value="10">非暴力沟通</option>
        </select>
        <p style="color: white;"> 请写阅读收获：</p>
   <textarea  maxlength="600"  id='text' class="form-control" rows="12" name="coment" form="submit" onfocus="if(value=='限300字哦~'){value=''}"
              onblur="if (value ==''){value='限300字哦~'}"></textarea>
        <input type="text"  name="useropen" form="submit" value="<?php echo $open; ?>" style="display: none" >
        <input type="text"  name="userimg" form="submit" value="<?php echo $user_headimg; ?>" style="display: none" >
        <input type="text"  name="usernick" form="submit" value="<?php echo $user_nickname; ?>" style="display: none">

        <button type="submit" form="submit" class="btn btn-default" style="margin-top: 10px">提交</button>
    </form>
</div>
</body>
</html>
