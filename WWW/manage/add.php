<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_manage_add();
}
?>
<?php
include_once('../comm/head.php');
?>
<script>
function XMLOBJ()
{
	var XMLHTTP=null;
	try
	{
		XMLHTTP=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			XMLHTTP=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				XMLHTTP=new XMLHttpRequest();
			}
			catch(e)
			{
			}
		}
	}
	return XMLHTTP;
}
function checkentry(id)
{
	var XML=XMLOBJ();
	XML.open("GET","check.php?id="+id+"&time="+Math.random(),false);
	XML.send(null);
	if(XML.readyState==4)
	{
		var s=XML.responseText;
		s=s.toLowerCase();
		//alert(s);
		return s=="1";
	}
}
function checkform(frm)
{
	with(frm)
	{
		if(name.value=="")
		{
			alert("请填写帐号！");
			return false;
		}
		if(checkentry(name.value))
		{
			alert("当前帐号 "+name.value+" 已经被其他操作员所使用！\r\n\r\n请重新选择帐号.");
			return false;
		}
		if(pass.value=="")
		{
			alert("请填写密码！");
			return false;
		}
		if(mail.value=="")
		{
			alert("请填写邮箱！");
			return false;
		}
	}
}
</script>
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="158" align="center" valign="top" bgcolor="#353535">
	<?php
	include_once('../inc/left.php');
	?>
	</td>
    <td valign="top" bgcolor="#353535">
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;操作员管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 操作员添加</div>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="160" align="center" bgcolor="#353535">编号</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="entry" type="text" id="entry" value="" size="10" /></td>
   <td width="160" align="center" bgcolor="#353535">帐号</td>
   <td bgcolor="#353535">&nbsp;<input name="name" type="text" id="name" value="" size="20" /></td>
   </tr>
   <tr height="25" bgcolor="#353535">
   <td width="160" align="center" bgcolor="#353535">密码</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="pass" type="password" id="pass" value="" size="20" /></td>
   <td width="160" align="center" bgcolor="#353535">邮箱</td>
   <td bgcolor="#353535">&nbsp;<input name="mail" type="text" id="mail" value="" size="20" /></td>
</tr>
   <tr height="35" bgcolor="#353535">
	<td colspan="4" align="center">
	<input type="submit" name="Submit2" value="保存" />
	<input type="button" onClick="history.back();" name="Submit3" value="返回" />
	</td>
  </tr>
</form>
</table>	  
<?php
include_once('../comm/foot.php');
?>