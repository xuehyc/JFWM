<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
$db_web = 'wowweb';//��̨���ݿ�,���û��,�뵼��web.sql�ļ�
//$db_web = 'jfweb';//��������,���ù�
$db_auth = 'mangos2_auth';//$db_auth = 'jfwow_realmd';//�˺����ݿ�
$db_char = 'mangos2_char';//��ɫ���ݿ�
$db_world = 'mangos2_world';//�������ݿ�

//ע��:�ܿ�ָ��-��Ҫ�޸�mysql�������˿�,��Ȼһ�Ѵ���,��������ʹ��,��������Ե��,��Ϊ��php�汾������
$conn = mysql_connect('localhost','root','root') or die('server error!');
//$conn = mysqli_connect('localhost','root','root') or die('server error!');
//��������ΪPHP�汾ԭ��,֮ǰ����������,���ڲ���
//$conn = mysql_connect('localhost','root','jfwow') or die('server error!');
//mysql��������ַ, mysql�˺�, mysql����
$db = mysql_select_db($db_web,$conn) or die('db error!��̨���ݿ�,���û��,�뵼��web.sql�ļ�');
$lang = mysql_query('SET NAMES gbk') or die('lang error!');
$listnum = 20;



/*
 * ��ĵ�
$servername='localhost';
$dbusername='root';
$dbpassword='root';
$dbname='wowweb';
//�������ݿ� 7.0
$db_cn = mysqli_connect($servername , $dbusername , $dbpassword , $dbname) OR die ('�����и����鷳��---> �޷���¼MYSQL��������');

//$db_cnתΪȫ�ֱ���
global $db_cn;

//�������ݿ��ʽΪUTF8
//mysqli_query($db_cn , "SET NAMES 'UTF8'");
mysqli_query($db_cn , "SET NAMES gbk");
//�����ڵ���mysqli_query
//function test(){
    $sql = "SET NAMES 'UTF8'";

    //$GLOBALS['db_cn']����Ϊ�����ڵ���ȫ�ֱ���$db_cn�ķ�ʽ
    mysqli_query($GLOBALS['db_cn'] , $sql);
//}
$listnum = 20;

*/
?>