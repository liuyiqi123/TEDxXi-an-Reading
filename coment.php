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



    $sql="INSERT INTO coment(openid,headimg,nickname,coment) VALUES ('$user_open','$user_headimg','$user_nick','$coment')";

    if(mysql_query($sql)){
        echo 'yes';}
    else{echo mysql_errno() . ": " . mysql_error() . " ";}





