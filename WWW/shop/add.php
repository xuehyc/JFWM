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
			alert("����д�̵�ID��");
			return false;
		}
		if(itemid.value=="")
		{
			alert("����д��ƷID��");
			return false;
		}
		if(money.value=="")
		{
			alert("����д��Ҽ۸��������0��");
			return false;
		}
		if(mb.value=="")
		{
			alert("����д���ּ۸��������0��");
			return false;
		}
		if(free4vip.value=="")
		{
			alert("����д��ѵȼ���Ĭ������0��");
			return false;
		}
		if(checkentry(shopid.value,itemid.value))
		{
			alert("��ǰ�̵� "+shopid.value+" �Ѿ�������Ʒ"+itemid.value+"��\r\n\r\n��������д.");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;�̵����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> �̵��������</div>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="160" align="center" bgcolor="#353535">�̵�ID:</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="entry" type="text" id="entry" value="" size="10" /></td>
   <td width="160" align="center" bgcolor="#353535">��ƷID:</td>
   <td bgcolor="#353535">&nbsp;<input name="item" type="text" id="item" value="" size="10" /></td>
   </tr>
   <tr height="25" bgcolor="#353535">
   <td width="160" align="center" bgcolor="#353535">��Ҽ۸�:</td>
   <td align="left" width="36%" bgcolor="#353535">&nbsp;<a href="../item/" target="_blank">�������Ʒ�����޸�</a><!--<input name="buyprice" type="text" id="buyprice" value="" size="10" />--></td>
   <td width="160" align="center" bgcolor="#353535">���ּ۸�:</td>
   <td bgcolor="#353535">&nbsp;<input name="jf" type="text" id="jf" value="" size="10" /></td>
   </tr>
   <td width="160" align="center" bgcolor="#353535">�޶�VIP�ȼ�:</td>
   <td bgcolor="#353535">&nbsp;<input name="vip" type="text" id="vip" value="" size="10" /></td>
   <td width="160" align="center" bgcolor="#353535">�ָ�ʱ��:</td>
   <td bgcolor="#353535">&nbsp;<input name="incrtime" type="text" id="incrtime" value="0" size="10" /></td>
   </tr>
   <td width="160" align="center" bgcolor="#353535">��չ����:</td>
   <td bgcolor="#353535">&nbsp;<input name="extendedcost" type="text" id="extendedcost" value="0" size="10" /><a href="../img/help/ItemExtendedCost.dbc.txt"><img src="../img/help/excel_icon.gif" alt="�鿴��չ�����������" align="middle" /></a></td>
   <td width="160" align="center" bgcolor="#353535">�������:</td>
   <td bgcolor="#353535">&nbsp;<input name="maxcount" type="text" id="maxcount" value="0" size="10" /></td>
</tr>
   <tr height="35" bgcolor="#353535">
	<td colspan="4" align="center">
	<input type="submit" name="Submit2" value="����" />
	<input type="button" onClick="history.back();" name="Submit3" value="����" />
	</td>
  </tr>
</form>
</table>	  
<?php
include_once('../comm/foot.php');
?>