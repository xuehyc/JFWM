<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_auth.'`.`_jf_add` ';
	$sql .= " WHERE (`entry`='" .intval(trim($_REQUEST['id'])). "') ";
	$query = mysql_query($sql);
}
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
              <td align="left" bgcolor="#353535">&nbsp;<input name="uname" type="text" id="uname" size="20" />
			  <input name="only" type="checkbox" id="only" value="1">
			  精确查询</td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="查询" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="显示全部" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 充值记录查询结果>></div>
<table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>用户名</th>
                <th>充值积分</th>
				<th>充值时间</th>
				<th>是否领取</th>
				<th>备注</th>
				<th>删除</th>
              </tr>
				<?php
				$sql = sy_score_show($pn,$num,$page,$pages);
				
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['username'].'</td>';
					echo '<td>'.$rs['value'].'</td>';
					echo '<td>'.$rs['date'].'</td>';
					$info = array("<font color=#00FF00>未领取</font>","<font color=gray>已经领取</font>");
					$info2 = array("未领取","已经领取");

					echo '<td>'.$info[$rs['flag']].'</td>';
					echo '<td>'.$rs['memo'].'</td>';
					echo '<td><a href="?act=del&id='.$rs['entry'].'"  onclick="return confirm(\'是否确定删除 用户:'.$rs['username'].' 积分:'.$rs['value'].' '.$info2[$rs['flag']].'\');">删除</a></td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="6" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>