<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
$db_web = 'wowweb';//��̨���ݿ�,���û��,�뵼��web.sql�ļ�
//$db_web = 'jfweb';//��������,���ù�
$db_auth = 'mangos2_auth';//$db_auth = 'jfwow_realmd';//�˺����ݿ�
$db_char = 'mangos2_char';//��ɫ���ݿ�
$db_world = 'mangos2_world';//�������ݿ�
$conn = mysql_connect('localhost','root','root') or die('server error!');
//��������ΪPHP�汾ԭ��,֮ǰ����������,���ڲ���
//$conn = mysql_connect('localhost','root','jfwow') or die('server error!');
//mysql��������ַ, mysql�˺�, mysql����
$db = mysql_select_db($db_web,$conn) or die('db error!��̨���ݿ�,���û��,�뵼��web.sql�ļ�');
$lang = mysql_query('SET NAMES gbk') or die('lang error!');
$listnum = 20;
?>