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
	sy_shop_add();
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
function checkentry(id,entry)
{
	var XML=XMLOBJ();
	XML.open("GET","check.php?shopid="+id+"&itemid="+entry+"&time="+Math.random(),false);
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
		if(shopid.value=="")
		{
			alert("请填写商店ID！");
			return false;
		}
		if(itemid.value=="")
		{
			alert("请填写物品ID！");
			return false;
		}
		if(money.value=="")
		{
			alert("请填写金币价格，免费请填0！");
			return false;
		}
		if(mb.value=="")
		{
			alert("请填写积分价格，免费请填0！");
			return false;
		}
		if(free4vip.value=="")
		{
			alert("请填写免费等级，默认请填0！");
			return false;
		}
		if(checkentry(shopid.value,itemid.value))
		{
			alert("当前商店 "+shopid.value+" 已经包含物品"+itemid.value+"！\r\n\r\n请重新填写.");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;商店管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 商店数据添加</div>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="160" align="center" bgcolor="#353535">商店ID:</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="entry" type="text" id="entry" value="" size="10" /></td>
   <td width="160" align="center" bgcolor="#353535">物品ID:</td>
   <td bgcolor="#353535">&nbsp;<input name="item" type="text" id="item" value="" size="10" /></td>
   </tr>
   <tr height="25" bgcolor="#353535">
   <td width="160" align="center" bgcolor="#353535">金币价格:</td>
   <td align="left" width="36%" bgcolor="#353535">&nbsp;<a href="../item/" target="_blank">请进入物品管理修改</a><!--<input name="buyprice" type="text" id="buyprice" value="" size="10" />--></td>
   <td width="160" align="center" bgcolor="#353535">积分价格:</td>
   <td bgcolor="#353535">&nbsp;<input name="jf" type="text" id="jf" value="" size="10" /></td>
   </tr>
   <td width="160" align="center" bgcolor="#353535">限定VIP等级:</td>
   <td bgcolor="#353535">&nbsp;<input name="vip" type="text" id="vip" value="" size="10" /></td>
   <td width="160" align="center" bgcolor="#353535">恢复时间:</td>
   <td bgcolor="#353535">&nbsp;<input name="incrtime" type="text" id="incrtime" value="0" size="10" /></td>
   </tr>
   <td width="160" align="center" bgcolor="#353535">扩展货币:</td>
   <td bgcolor="#353535">&nbsp;<input name="extendedcost" type="text" id="extendedcost" value="0" size="10" /><a href="../img/help/ItemExtendedCost.dbc.txt"><img src="../img/help/excel_icon.gif" alt="查看扩展货币相关数据" align="middle" /></a></td>
   <td width="160" align="center" bgcolor="#353535">最大数量:</td>
   <td bgcolor="#353535">&nbsp;<input name="maxcount" type="text" id="maxcount" value="0" size="10" /></td>
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