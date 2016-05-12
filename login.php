<?php
if(isset($_SESSION['open'])){
    echo '<script language="javascript">location.href="http://www.thinkout-art.com/reading/home.php";</script>';
    exit;}

$APPID='';
$REDIRECT_URI='http://www.thinkout-art.com/reading/user.php';
$scope='snsapi_userinfo';
//$scope='snsapi_userinfo';//需要授权
$url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$APPID.'&redirect_uri='.$REDIRECT_URI.'&response_type=code&scope='.$scope.'#wechat_redirect';
header("Location:".$url);
?>
