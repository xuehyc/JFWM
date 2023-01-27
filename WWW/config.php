<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
$db_web = 'wowweb';//后台数据库,如果没有,请导入web.sql文件
//$db_web = 'jfweb';//上面有了,不用管
$db_auth = 'mangos2_auth';//$db_auth = 'jfwow_realmd';//账号数据库
$db_char = 'mangos2_char';//角色数据库
$db_world = 'mangos2_world';//世界数据库

//注意:避坑指南-不要修改mysql服务器端口,不然一堆错误,不能正常使用,还看不出缘由,以为是php版本的问题
$conn = mysql_connect('localhost','root','root') or die('server error!');
//$conn = mysqli_connect('localhost','root','root') or die('server error!');
//可能是因为PHP版本原因,之前可以正常打开,现在不行
//$conn = mysql_connect('localhost','root','jfwow') or die('server error!');
//mysql服务器地址, mysql账号, mysql密码
$db = mysql_select_db($db_web,$conn) or die('db error!后台数据库,如果没有,请导入web.sql文件');
$lang = mysql_query('SET NAMES gbk') or die('lang error!');
$listnum = 20;



/*
 * 后改的
$servername='localhost';
$dbusername='root';
$dbpassword='root';
$dbname='wowweb';
//连接数据库 7.0
$db_cn = mysqli_connect($servername , $dbusername , $dbpassword , $dbname) OR die ('我们有个大麻烦！---> 无法登录MYSQL服务器！');

//$db_cn转为全局变量
global $db_cn;

//设置数据库格式为UTF8
//mysqli_query($db_cn , "SET NAMES 'UTF8'");
mysqli_query($db_cn , "SET NAMES gbk");
//函数内调用mysqli_query
//function test(){
    $sql = "SET NAMES 'UTF8'";

    //$GLOBALS['db_cn']这里为函数内调用全局变量$db_cn的方式
    mysqli_query($GLOBALS['db_cn'] , $sql);
//}
$listnum = 20;

*/
?>