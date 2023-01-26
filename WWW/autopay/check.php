<?php
include_once('../config.php');
include_once('../inc/check.php');

$sql = "SELECT * FROM `".$db_world."`.`accounts` WHERE acct='".trim($_POST['v_oid'])."'";
$query = mysql_query($sql,$conn);
$res = 0;
while($rs=mysql_fetch_array($query))
{
	$res = 1;
}
echo $res;
?>