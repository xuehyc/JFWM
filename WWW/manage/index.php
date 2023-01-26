<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;操作员管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 操作员列表>></div>
<table id="tab">
			  <tr align="center">
                <td height="25" colspan="9" bgcolor="#353535"><a href="add.php">添加操作员</a></td>
              </tr>
              <tr height="25" align="center">
                <th>编号</th>
                <th>帐号</th>
                <th>邮箱</th>
                <th>最后登陆</th>
                <th>IP地址</th>
				<th>编辑</th>
              </tr>
				<?php
				$sql = sy_manage_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['aid'].'</td>';
					echo '<td><a href="edit.php?id='.$rs['aid'].'">'.$rs['aname'].'</a></td>';
					echo '<td>'.$rs['amail'].'</td>';
					echo '<td>'.date('Y-m-d h:i:s',$rs['alasttime']+8*60*60).'</td>';
					echo '<td>'.$rs['alastip'].'</td>';
					echo '<td><a href="edit.php?id='.$rs['aid'].'">编辑</a></td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="6" height="35" bgcolor="#353535">'.sy_page('',$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>