<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/func.php');
$act = strtolower($_GET['act']);
if($act=="logout")
{
	sy_manage_logout();
}
if($act=="login")
{
	sy_manage_login();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN">
<head>
	<title>���ħ����ҵ�� &rsaquo; ��¼</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' id='login-css'  href='../inc/login.css?ver=20110121' type='text/css' media='all' />
<meta name='robots' content='noindex,nofollow' />
</head>
<body>

<!-- Main Body Starts Here -->
<div id="main_body">

<!-- Form Starts Here -->
<div class="form_box">

<form action="?act=login" method="post">

<!-- User Name -->
<p class="form_text">
* �� ��
</p>

<p class="form_input_BG"><input type="text" name="uname" id="uname" value=""/></p>
<!-- User Name -->

<!-- Clear -->
<p class="clear">&nbsp;
</p>
<!-- Clear -->

<!-- Password -->
<p class="form_text">
* �� ��
</p>

<p class="form_input_BG"><input type="password" name="upass" id="upass" value=""/></p>
<!-- Password -->

<!-- Clear -->
<p class="clear">&nbsp;
</p>
<!-- Clear -->

<p class="form_check_box">
Ĭ�Ϲ����ʺţ�admin ���룺admin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ס�ҵĵ�¼��Ϣ <input type="checkbox" name="chk" id="chk" checked="checked" value=""/>
</p>

<p class="form_login_signup_btn">
<input title="��¼" style="margin-left:96px;" type="image" src="../img/logo/login_btn.png" name="login" id="login" /> <input type="image" src="../img/logo/signup_btn.png" title="ע��" name="signup" id="signup" />
</p>

</form>

</div>
<!-- Form Ends Here -->

</div>
<!-- Main Body Ends Here -->


</body>
</html>
