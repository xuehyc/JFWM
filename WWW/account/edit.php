<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
?>
<?php
function sha_password($user,$pass){
	$user = strtoupper($user);
	$pass = strtoupper($pass);
	return SHA1($user.':'.$pass);
}
				
if(trim(strtolower($_REQUEST['act']))=="save")
{

$sql = 'SELECT b.*,c.gmlevel ';
$sql .= 'FROM `'.$db_auth.'`.`account` as b ';
$sql .= 'LEFT JOIN `'.$db_auth.'`.`account_access` as c ';
$sql .= 'ON (b.id=c.id) ';
$sql .= 'WHERE b.id='.intval(trim($_REQUEST['entry']));
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);

	$sql = 'UPDATE `'.$db_auth.'`.`account` SET' ;
	//$sql .= "SET `username` = '".trim($_REQUEST['name'])."', ";
	if(trim($_REQUEST['pass']))
	{
		$sql .= " `sha_pass_hash` = '" .sha_password(trim($_REQUEST['username']),trim($_REQUEST['pass'])). "', ";
		$sql .= " `sessionkey`=NULL, `v`=NULL, `s`=NULL , ";
	}
	$sql .= "`email` = '" .trim($_REQUEST['mail']). "', ";


	$sql .= "`jf` = '" .intval(trim($_REQUEST['jf'])). "',  ";
	$sql .= "`vip` = '" .intval(trim($_REQUEST['vip'])). "'  ";
	$sql .= "WHERE `id` = '" .intval(trim($_REQUEST['entry'])). "'";
	$query = mysql_query($sql);

	//gmȨ�޵��޸� �� ���ʺ��޸�
	if($rs['gmlevel']!="" )
	{
		$sql = 'UPDATE `'.$db_auth.'`.`account_access` SET ';
		$sql .= "`gmlevel` = '" .intval(trim($_REQUEST['gmlevel']))."' ";
		$sql .= "WHERE `id` = '" .intval(trim($_REQUEST['entry'])). "'";
		$query = mysql_query($sql);
	}else if(intval(trim($_REQUEST['gmlevel']))){
		$sql = 'INSERT INTO `'.$db_auth.'`.`account_access` (`id`, `gmlevel`, `RealmID`) VALUES ';
		$sql .= "('" .intval(trim($_REQUEST['entry'])). "', '" .intval(trim($_REQUEST['gmlevel']))."', '-1')";
		$query = mysql_query($sql);
	}
	
	if(intval(trim($_REQUEST['stat']))==1)
	{
		$sql = 'INSERT INTO `'.$db_auth.'`.`account_banned` (`id`, `bandate`, `unbandate`, `bannedby`, `banreason`, `active`) VALUES ';
		$sql .= " ('" .intval(trim($_REQUEST['entry'])). "', '1303016631', '2166930231', '1', '��̨�޸�', '1') ";
		$query = mysql_query($sql);
	}else{
	$sql = 'DELETE FROM `'.$db_auth.'`.`account_banned` ';
	$sql .= " WHERE (`id`='" .intval(trim($_REQUEST['entry'])). "') ";
	$query = mysql_query($sql);
	}
	//gmȨ�޵��޸� �� ���ʺ��޸�
	
	
	sy_log('�޸��ʺ���Ϣ(ID:'.intval(trim($_REQUEST['entry'])).')');
	echo "<script>alert('�ʺ�: ".trim($_REQUEST['username'])." �����޸ĳɹ�!');history.back();</script>";exit;
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
			// alert("���벻��Ϊ��!");
			// pass.focus();
			// return false;
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
    	    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;�ʺű༭</div>
<?php
$sql = 'SELECT b.*,c.gmlevel ';
$sql .= 'FROM `'.$db_auth.'`.`account` as b ';
$sql .= 'LEFT JOIN `'.$db_auth.'`.`account_access` as c ';
$sql .= 'ON (b.id=c.id) ';
$sql .= 'WHERE b.id='.intval($_GET['id']);
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);

		//���Ƿ񱻷�
		$query_ban = mysql_query("SELECT * FROM ".$db_auth.".account_banned WHERE id = '".$rs['id']."' and active<> '0' ",$conn);
		$stat = mysql_fetch_array($query_ban)?"1":"0";
?>
&nbsp;
<div id="rightTop"><input id="showHide" type="button"> �ʺ��޸�</div>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">���</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo $rs['id'];?><input name="entry" type="hidden" id="entry" value="<?php echo $rs['id'];?>" size="10" readonly="true" /></td>
   <td width="110" align="center" bgcolor="#353535">�û���</td>
   <td bgcolor="#353535">&nbsp;<input name="username" type="text" id="username" value="<?php echo $rs['username'];?>" size="10" style="border:0;background:transparent;color:#FFFFFF" Readonly/></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">����</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="pass" type="text" id="pass" value="<?php echo $rs['password'];?>" size="10" />
   <font color=gray> ��������Ϊ���޸�</font>
   </td>
   <td width="110" align="center" bgcolor="#353535">����</td>
   <td bgcolor="#353535">&nbsp;<input name="mail" type="text" id="mail" value="<?php echo $rs['email'];?>" size="20" /></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">GM�ȼ�</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="gmlevel" type="text" id="gmlevel" value="<?php echo $rs['gmlevel'];?>" size="10" /></td>
   <td width="110" align="center" bgcolor="#353535">״̬</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo sy_select("stat",array("����","����"),intval($stat));?></td>

  </tr>
    <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">�������</td>
   <td bgcolor="#353535">&nbsp;<input name="jf" type="text" id="jf" value="<?php echo $rs['jf'];?>" size="10" /> <img src="..\img\jf.png" /></td>
   <td width="110" align="center" bgcolor="#353535">��Ա�ȼ�</td>
   <td bgcolor="#353535">&nbsp;<input name="vip" type="text" id="vip" value="<?php echo $rs['vip'];?>" size="10" /> <img src="..\img\vip.gif" /></td>
  </tr>
      <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">����½ʱ��</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['last_login'];?></td>
   <td width="110" align="center" bgcolor="#353535">����½IP</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['last_ip'];?></td>
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