<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vicky
 * Date: 16/5/5
 * Time: 下午10:13
 */

require_once 'connectdb.php';

mysql_select_db('test',$_conn);
mysql_query("set names 'utf8' ");

$user_open=$_POST["useropen"];
$user_headimg=$_POST["userimg"];
$user_nick=$_POST["usernick"];
$coment=$_POST["coment"];
$bookid=$_POST["bookid"];

$result =  mysql_query("SELECT * FROM submit where openid='$user_open'AND bookid='$bookid' ");
$num=mysql_num_rows($result);

if($num == '0') {

    $sql = "INSERT INTO submit(openid,headimg,nickname,coment,bookid) VALUES ('$user_open','$user_headimg','$user_nick','$coment','$bookid')";

    if (mysql_query($sql)) {
        echo '提交成功';
        echo '<script language="javascript">location.href="home.php";</script>';
    } else {
        echo '提交失败';
        echo '<script language="javascript">location.href="submit.php";</script>';
    }

}else{
    echo '请勿重复提交';
    echo '<script language="javascript">location.href="submit.php";</script>';
}



