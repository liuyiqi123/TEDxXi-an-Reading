
<?php
error_reporting(0);
session_start();

/*
 *网页授权获取用户openid
*/
header("Content-type:text/html;charset=utf-8");
$code=$_GET['code'];
$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx77be4299b302c1c1&secret=24ee038f06f328e10dbbc384e40eb57b&code=".$code."&grant_type=authorization_code";
$openidarr=json_decode(gettoken($url),ture);

//print_r($openidarr);

$openid=$openidarr['openid'];
$token=$openidarr['access_token'];


$infourl="https://api.weixin.qq.com/sns/userinfo?access_token=".$token."&openid=".$openid."&lang=zh_CN";
$userinfoarr=json_decode(gettoken($infourl),ture);


$user_nick= $userinfoarr['nickname'];
$user_open= $userinfoarr['openid'];
$user_headimg= $userinfoarr['headimgurl'];

$_SESSION['headimg']= $user_headimg;
$_SESSION['nick']= $user_nick;
$_SESSION['open']= $user_open;

$lifeTime = 365 * 24 * 3600;
setcookie('open',$user_open,  time() + $lifeTime, "/");
setcookie('nick',$user_nick,  time() + $lifeTime, "/");
setcookie('head',$user_headimg,  time() + $lifeTime, "/");



function gettoken($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22");
    curl_setopt($ch, CURLOPT_ENCODING ,'gzip'); //加入gzip解析
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

    require_once 'connectdb.php';

    mysql_select_db('test',$_conn);
    mysql_query("set names 'utf8' ");

    $result =  mysql_query("SELECT * FROM users where openid='$user_open'");
        $num=mysql_num_rows($result);

        if($num == '0'){

            $result2 =  mysql_query("SELECT * FROM users");
            $idnum = mysql_num_rows($result2);
            $id = $idnum++ ;
            $sql="INSERT INTO users(openid,headimg,nickname,id) VALUES ('$user_open','$user_headimg','$user_nick','$id')";

            if(mysql_query($sql)){
                echo '<script language="javascript">location.href="home.php";</script>';}
            else{echo mysql_errno() . ": " . mysql_error() . " ";}

        }else{
            echo '<script language="javascript">location.href="home.php";</script>';}











?>