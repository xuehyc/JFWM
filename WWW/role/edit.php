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
	$sql = 'UPDATE `'.$db_char.'`.`accounts` ';
	//$sql .= "SET `login` = '".trim($_REQUEST['name'])."', ";
	$sql .= "SET `password` = '" .trim($_REQUEST['pass']). "', ";
	$sql .= "`email` = '" .trim($_REQUEST['mail']). "', ";
	$sql .= "`gm` = '" .intval(trim($_REQUEST['gm']))."', ";
	$sql .= "`banned` = '" .intval(trim($_REQUEST['stat'])). "' ";
	$sql .= "WHERE `acct` = '" .intval(trim($_REQUEST['entry'])). "'";
	$query = mysql_query($sql);
	
	sy_log('�޸��ʺ���Ϣ(ID:'.intval(trim($_REQUEST['entry'])).')');
	
	header("location:?id=".intval(trim($_REQUEST['entry'])));
}
?>
<?php
include_once('../comm/head.php');
?>
<script>
function checkform(frm)
{
	with(frm)
	{
		if(pass.value=="")
		{
			alert("���벻��Ϊ��!");
			pass.focus();
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
		  <table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" colspan="4" bgcolor="#171717">��̨����&gt;�ʺ�</td>
            </tr>
	  </table>
<?php
$sql = 'SELECT b.* ';
$sql .= 'FROM `'.$db_char.'`.`characters` as b ';
//$sql .= 'LEFT JOIN `'.$db_char.'`.`_tradvalue` as c ';
//$sql .= 'ON (b.acct=c.accid) ';
$sql .= 'WHERE b.guid='.intval($_GET['id']);
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
					$query_account = mysql_query("SELECT * FROM ".$db_auth.".account WHERE id = '".$rs['account']."'",$conn);//�˺�
					$account = mysql_fetch_array($query_account);
?>
&nbsp;
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
  <tr bgcolor="#333333">
	<td height="35" colspan="6" align="center">��ɫ�����޸�<br>
	�����˺�:<?php echo $account['username']." <font color=gray>(id:".$account['id'].")</font>";?><input name="entry" type="hidden" id="entry" value="<?php echo $account['id'];?>" size="10" readonly="true" /> <?php echo '&nbsp;����:'.$account['jf'].' &nbsp;VIP:'.$account['id'].' &nbsp;<a href="../account/edit.php?id='.$account['id'].'">[�޸��˺�����]</a>' ; ?>
	</td>
  </tr>
   <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">GUID</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo $rs['guid'];?></td>
   <td width="110" align="center" bgcolor="#353535">��ɫ��</td>
   <td bgcolor="#353535">&nbsp;<font color=#00FF00><?php echo $rs['name'];?></font></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">����</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="pass" type="text" id="pass" value="<?php echo $rs['password'];?>" size="10" /></td>
   <td width="110" align="center" bgcolor="#353535">����</td>
   <td bgcolor="#353535">&nbsp;<input name="mail" type="text" id="mail" value="<?php echo $rs['email'];?>" size="20" /></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">Ȩ��</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo sy_select("gm",array("��ͨ���","","","ϵͳ������"),intval($rs['gm']));?></td>
   <td width="110" align="center" bgcolor="#353535">״̬</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo sy_select("stat",array("����","����"),intval($rs['banned']));?></td>

  </tr>
    <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">�������</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['value'];?></td>
   <td width="110" align="center" bgcolor="#353535">��Ա�ȼ�</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['vip'];?></td>
  </tr>
      <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">����½ʱ��</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['lastlogin'];?></td>
   <td width="110" align="center" bgcolor="#353535">����½IP</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['lastip'];?></td>
  </tr>

			   <tr height="35" bgcolor="#353535">
                <td colspan="4" align="center"><input type="submit" name="Submit2" value="�޸�" />
				<input type="button" onClick="history.back();" name="Submit3" value="����" /></td>
              </tr>
      </form></table></td>
  </tr>


</table>
<?php
include_once('../comm/foot.php');
?>