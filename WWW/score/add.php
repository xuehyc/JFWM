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
	sy_score_edit();
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
		return s=="1";
	}
}
function checkform(frm)
{
	with(frm)
	{
		if(name.value=="")
		{
			alert("请输入要充值的用户名.");
			name.focus();
			return false;
		}
		if(!checkentry(name.value))
		{
			alert("用户 "+name.value+" 不存在！\r\n\r\n请重新输入.");
			name.focus();
			return false;
		}
		if(!parseInt(avalue.value))
		{
			alert("积分必须为大于1的整数！\r\n\r\n请重新输入.");
			avalue.focus();
			return false;
		}
		if(!confirm("你将为用户 "+name.value+" 充值积分："+avalue.value+"！\r\n操作理由是："+reason.value+"\r\n\r\n是否继续？"))
		{
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;积分管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 积分充值</div>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="237" align="center" bgcolor="#353535"><div align="right">用户名 </div></td>
   <td width="320" bgcolor="#353535"> <input name="name" type="text" id="name" value="" size="20" /></td>
   </tr>
   <tr height="25" bgcolor="#353535">
   <td width="237" align="center" bgcolor="#353535"><div align="right">添加积分</div></td>
   <td bgcolor="#353535"><input name="avalue" type="text" id="avalue" value="" size="20" /></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="237" align="center" bgcolor="#353535"><div align="right">操作理由</div></td>
   <td bgcolor="#353535"><input name="reason" type="text" id="reason" value="" size="100" /></td>
  </tr>
   <tr height="35" bgcolor="#353535">
	<td colspan="2" align="center"><input type="submit" name="Submit2" value="提交" /> &nbsp;
	  <input type="button" onClick="history.back();" name="Submit3" value="返回" /></td>
  </tr>
      </form></table></td>
  </tr>


</table>
<?php
include_once('../comm/foot.php');
?>