<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`creature_template` ';
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;NPC管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 查询条件>></div>
<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">NPC编号</td>
              <td width="40%" align="left" bgcolor="#353535">&nbsp;<input name="npc_entry" type="text" id="npc_entry" size="20" /></td>
              <td width="65" align="center" bgcolor="#666666">NPC名称</td>
              <td width="40%" align="left">&nbsp;<input name="npc_name" type="text" id="npc_name" size="20" /></td>
            </tr>
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">NPC级别</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("npc_rank",$wow_rank);?></td>
              <td width="65" align="center" bgcolor="#666666">NPC等级</td>
              <td width="40%" align="left">&nbsp;<input name="npc_level" type="text" id="npc_level" size="20" /></td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="查询" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="显示全部" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> NPC查询结果>></div>
<table id="tab">
              <tr>
                <td height="25" bgcolor="#353535" colspan="11">NPC查询结果&gt;&gt;</td>
              </tr>
              <tr height="25" align="center" class="tb_title">
                <th>NPC编号</th>
                <th>名称</th>
                <th>称谓</th>
                <th>等级</th>
                <th>类型</th>
                <th>家族</th>
                <th>模型</th>
                <th>级别</th>
                <th>种族阵营</th>
                <th>npcflag</th>
                <th>删除</th>
              </tr>
				<?php
				$sql = sy_npc_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['entry'].'</td>';
					echo '<td><a href="edit.php?id='.$rs['entry'].'">'.$rs['name'].'</a></td>';
					echo '<td>'.$rs['subname'].'</td>';
					echo '<td>'.$rs['minlevel'].'-'.$rs['maxlevel'].'</td>';
					echo '<td>'.$wow_type[$rs['type']].'</td>';
					echo '<td>'.$wow_family[$rs['family']].'</td>';
					echo '<td><a href="http://db.178.com/wow/cn/npc/'.$rs['entry'].'.html" target="_blank" >'.$rs['modelid1'].'/'.$rs['modelid2'].'</a></td>';
					echo '<td>'.$wow_rank[$rs['rank']].'</td>';
					echo '<td>'.$wow_faction[$rs['faction_A']].'</td>';
					$str = array();
					if($rs['npcflag']>0)
					{
						$arr = sy_exist($wow_flag,$rs['npcflag']);
						for($i=0;$i<sizeof($arr);$i++)
						{
							$str[] = $wow_flag[$arr[$i]];
						}
					}
					echo '<td style="line-height:120%">'.join('<br>',$str).'</td>';
					echo '<td><a href="?act=del&id='.$rs['entry'].'"  onclick="return confirm(\'是否确定删除 '.$rs['name'].'\');">删除</a></td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="11" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>