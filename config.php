<?php
$appid="wx77be4299b302c1c1";//微信公众号后台 appid
$appsecret="24ee038f06f328e10dbbc384e40eb57b";////微信公众号后台 appsecret 必须是认证的号才可以有权限


$weixin_name="西安新艺术中心";//公众号名称
$weixin_name_content="关注有惊喜";//公众号说明
$weixin_name_pic="http://www.thinkout-art.com/voicerecord/img/logo.jpg";//公众号logo地址
$page_url="http://www.thinkout-art.com/voicerecord/";//程序目录
$weixin_url="http://wap.koudaitong.com/v2/showcase/feature?alias=n5xkvq9h"; //微信地址

$fx_imgUrl="http://www.thinkout-art.com/img/share.jpg";//分享的小图片地址


function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

//获取随机串
function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }

//获取ticket
function getJsApiTicket($appid,$appsecret) {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("jsapi_ticket.json"));
    if ($data->expire_time < time()) {
      $accessToken = getAccessToken($appid,$appsecret);
      // 如果是企业号用以下 URL 获取 ticket
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res = json_decode(https_request($url));
      $ticket = $res->ticket;
      
      if ($ticket) {
        $data->expire_time = time() + 7000;
        $data->jsapi_ticket = $ticket;
        $fp = fopen("jsapi_ticket.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $ticket = $data->jsapi_ticket;
    }

    return $ticket;
}

/**
 * 获取访问token
 * @return [type] [description]
 */
function getAccessToken($appid,$appsecret) {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("access_token.json"));
    if ($data->expire_time < time()) {
      // 如果是企业号用以下URL获取access_token
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
      $res = json_decode(https_request($url));
       
      $access_token = $res->access_token;
      if ($access_token) {
        $data->expire_time = time() + 7000;
        $data->access_token = $access_token;
        $fp = fopen("access_token.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
    } else {
      $access_token = $data->access_token;
    }
  
    return $access_token;
  }




$wz_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$js_apk = getJsApiTicket($appid,$appsecret);
// var_dump($js_apk);

$timestamp = time();
$nonceStr = createNonceStr();
$ddd="jsapi_ticket=".$js_apk."&noncestr=".$nonceStr."&timestamp=".$timestamp."&url=".$wz_url."";
// var_dump($ddd);
$signature=sha1($ddd);

?>
