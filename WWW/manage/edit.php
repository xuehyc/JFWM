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
	sy_manage_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	sy_manage_del();
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
		alert(s);
		return s=="1";
	}
}
function checkform(frm)
{
	with(frm)
	{
		//if((entry.value=='')||(!checkentry(entry.value)))
		{
			if(mail.value=="")
			{
			alert("����д���䣡");
			return false;
			}
		}
		
	}
}
function checkdel(frm)
{
	if(confirm("�Ƿ�ɾ�����Ϊ "+frm.entry.value+" �Ĳ���Ա?\r\n\r\n����: һ��ִ�У��㽫���ܳ����˲���."))
	{
		location.href="?act=del&id="+frm.entry.value;
	}
}  
function openflag(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-350)/2;
	window.open("flag.php?id="+id+"&value="+value,"","width=150,height=350,scrollbars=yes,left="+myLeft+",top="+myTop);
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
		  <table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" colspan="4" bgcolor="#171717">��̨����&gt;����Ա����</td>
            </tr>
	  </table>
<?php
$sql = sy_manage_show();
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
?>
&nbsp;
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
  <tr bgcolor="#333333">
	<td height="35" colspan="4" align="center">����Ա�༭</td>
  </tr>
   <tr height="25" bgcolor="#353535">
   <td width="80" align="center" bgcolor="#353535">���</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="entry" type="text" id="entry" value="<?php echo $rs['aid'];?>" size="10" readonly="true" /></td>
   <td width="80" align="center" bgcolor="#353535">�ʺ�</td>
   <td bgcolor="#353535">&nbsp;<input name="name" type="text" id="name" value="<?php echo $rs['aname'];?>" size="20" readonly="true" /></td>
   </tr>
   <tr height="25" bgcolor="#353535">
   <td width="80" align="center" bgcolor="#353535">����</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="pass" type="password" id="pass" value="" size="20" /> 
   (���޸�������) </td>
   <td width="80" align="center" bgcolor="#353535">����</td>
   <td bgcolor="#353535">&nbsp;<input name="mail" type="text" id="mail" value="<?php echo $rs['amail'];?>" size="20" /></td>
</tr>
   <tr height="35" bgcolor="#353535">
	<td colspan="4" align="center">
	<input type="submit" name="Submit2" value="�޸�" />
	<?php
	if($_SESSION['aname']!=$rs['aname'])
	{
	?>
	<input type="button" name="del" value="ɾ��" onclick="checkdel(this.form)" />
	<?php
	}
	?>
	<input type="button" onclick="history.back();" name="Submit3" value="����" />
	</td>
  </tr>
      </form></table>
	  
<?php
include_once('../comm/foot.php');
?>