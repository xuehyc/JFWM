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
			alert("������Ҫ��ֵ���û���.");
			name.focus();
			return false;
		}
		if(!checkentry(name.value))
		{
			alert("�û� "+name.value+" �����ڣ�\r\n\r\n����������.");
			name.focus();
			return false;
		}
		if(!parseInt(avalue.value))
		{
			alert("���ֱ���Ϊ����1��������\r\n\r\n����������.");
			avalue.focus();
			return false;
		}
		if(!confirm("�㽫Ϊ�û� "+name.value+" ��ֵ���֣�"+avalue.value+"��\r\n���������ǣ�"+reason.value+"\r\n\r\n�Ƿ������"))
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;���ֹ���</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ���ֳ�ֵ</div>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="237" align="center" bgcolor="#353535"><div align="right">�û��� </div></td>
   <td width="320" bgcolor="#353535"> <input name="name" type="text" id="name" value="" size="20" /></td>
   </tr>
   <tr height="25" bgcolor="#353535">
   <td width="237" align="center" bgcolor="#353535"><div align="right">��ӻ���</div></td>
   <td bgcolor="#353535"><input name="avalue" type="text" id="avalue" value="" size="20" /></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="237" align="center" bgcolor="#353535"><div align="right">��������</div></td>
   <td bgcolor="#353535"><input name="reason" type="text" id="reason" value="" size="100" /></td>
  </tr>
   <tr height="35" bgcolor="#353535">
	<td colspan="2" align="center"><input type="submit" name="Submit2" value="�ύ" /> &nbsp;
	  <input type="button" onClick="history.back();" name="Submit3" value="����" /></td>
  </tr>
      </form></table></td>
  </tr>


</table>
<?php
include_once('../comm/foot.php');
?>