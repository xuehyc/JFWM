<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
include_once('../comm/head.php');
?>
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
	<div id="rightTop"><input id="showHide" type="button"> 查询条件>></div>
<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="300" height="25" align="center">用户名</td>
              <td align="left" bgcolor="#353535">&nbsp;<input name="uname" type="text" id="uname" size="20" /> <input name="only" type="checkbox" id="only" value="1">
              精确查询</td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="查询" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="显示全部" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
<div id="rightTop"><input id="showHide" type="button"> 积分余额查询结果>></div>
<table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>用户名</th>
                <th>会员级别</th>
                <th>积分</th>
                <th>帐号状态</th>
              </tr>
				<?php
				$sql = sy_score_search($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td><a href="list.php?only=1&uname='.$rs['username'].'">'.$rs['username'].'</a></td>';
//					switch(intval($rs['gm']))
//					{
//						case 0:$stat = "普通玩家";break;
//						case 3:$stat = "系统开发者";break;
//						default:$stat = "";break;
//					}
					echo '<td>'.$rs['vip'].'</td>';
					$query_jfadd = mysql_query("SELECT value FROM ".$db_auth."._jf_add WHERE accid = '".$rs['id']."' and flag= '0' ",$conn);
					while($rs_jfadd = mysql_fetch_array($query_jfadd))
					{
						$jfadd = $jfadd + $rs_jfadd['value'];
					}
					if($jfadd)
						$jfadd = '<a href="#" title="表 _jf_add 中未领取积分"> + '.$jfadd.'</a>';
					echo '<td>'.$rs['jf'].$jfadd.'</td>';
					$query_ban = mysql_query("SELECT * FROM ".$db_auth.".account_banned WHERE id = '".$rs['id']."' and active<> '0' ",$conn);
					$stat = mysql_fetch_array($query_ban)?"<font color=red>被封</font>":"正常";
					echo '<td>'.$stat.'</td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="4" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>