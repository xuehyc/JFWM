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
	
	sy_log('修改帐号信息(ID:'.intval(trim($_REQUEST['entry'])).')');
	
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
			alert("密码不能为空!");
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
              <td height="25" colspan="4" bgcolor="#171717">后台管理&gt;帐号</td>
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
					$query_account = mysql_query("SELECT * FROM ".$db_auth.".account WHERE id = '".$rs['account']."'",$conn);//账号
					$account = mysql_fetch_array($query_account);
?>
&nbsp;
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
  <tr bgcolor="#333333">
	<td height="35" colspan="6" align="center">角色资料修改<br>
	所属账号:<?php echo $account['username']." <font color=gray>(id:".$account['id'].")</font>";?><input name="entry" type="hidden" id="entry" value="<?php echo $account['id'];?>" size="10" readonly="true" /> <?php echo '&nbsp;积分:'.$account['jf'].' &nbsp;VIP:'.$account['id'].' &nbsp;<a href="../account/edit.php?id='.$account['id'].'">[修改账号数据]</a>' ; ?>
	</td>
  </tr>
   <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">GUID</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo $rs['guid'];?></td>
   <td width="110" align="center" bgcolor="#353535">角色名</td>
   <td bgcolor="#353535">&nbsp;<font color=#00FF00><?php echo $rs['name'];?></font></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">密码</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="pass" type="text" id="pass" value="<?php echo $rs['password'];?>" size="10" /></td>
   <td width="110" align="center" bgcolor="#353535">邮箱</td>
   <td bgcolor="#353535">&nbsp;<input name="mail" type="text" id="mail" value="<?php echo $rs['email'];?>" size="20" /></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">权限</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo sy_select("gm",array("普通玩家","","","系统开发者"),intval($rs['gm']));?></td>
   <td width="110" align="center" bgcolor="#353535">状态</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo sy_select("stat",array("正常","禁用"),intval($rs['banned']));?></td>

  </tr>
    <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">积分余额</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['value'];?></td>
   <td width="110" align="center" bgcolor="#353535">会员等级</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['vip'];?></td>
  </tr>
      <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">最后登陆时间</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['lastlogin'];?></td>
   <td width="110" align="center" bgcolor="#353535">最后登陆IP</td>
   <td bgcolor="#353535">&nbsp;<?php echo $rs['lastip'];?></td>
  </tr>

			   <tr height="35" bgcolor="#353535">
                <td colspan="4" align="center"><input type="submit" name="Submit2" value="修改" />
				<input type="button" onClick="history.back();" name="Submit3" value="返回" /></td>
              </tr>
      </form></table></td>
  </tr>


</table>
<?php
include_once('../comm/foot.php');
?>