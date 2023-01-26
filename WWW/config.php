<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
$db_web = 'wowweb';//后台数据库,如果没有,请导入web.sql文件
//$db_web = 'jfweb';//上面有了,不用管
$db_auth = 'mangos2_auth';//$db_auth = 'jfwow_realmd';//账号数据库
$db_char = 'mangos2_char';//角色数据库
$db_world = 'mangos2_world';//世界数据库
$conn = mysql_connect('localhost','root','root') or die('server error!');
//可能是因为PHP版本原因,之前可以正常打开,现在不行
//$conn = mysql_connect('localhost','root','jfwow') or die('server error!');
//mysql服务器地址, mysql账号, mysql密码
$db = mysql_select_db($db_web,$conn) or die('db error!后台数据库,如果没有,请导入web.sql文件');
$lang = mysql_query('SET NAMES gbk') or die('lang error!');
$listnum = 20;
?>