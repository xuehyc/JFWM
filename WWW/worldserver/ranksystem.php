<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_ranksystem_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`_ranksystem` ';
	$sql .= " WHERE (`rank`='" .intval(trim($_REQUEST['rank'])). "') ";
	$query = mysql_query($sql);
	header("location:ranksystem.php");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;军衔系统管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 军衔系统查询结果>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>军衔等级</th>
                <th>军衔名称</th>
        <th>需求物品</th>
        <th>需要荣誉点</th>
        <th>需要竞技点</th>
        <th>奖励生命值</th>
        <th>奖励魔法值</th>
        <th>奖励天赋</th>
        <th>奖励力量</th>
        <th>奖励精神</th>
        <th>奖励耐力</th>
        <th>奖励敏捷</th>
        <th>奖励智力</th>
        <th>删除</th>
              </tr>
				<?php
				$sql = ranksystem($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="rank[]" type="hidden" id="rank[]" value="'.$rs['rank'].'" size="1"/>
			<input name="newrank[]" type="text" id="newrank[]" value="'.$rs['rank'].'" size="1" title="军衔等级, 不建议修改这里"/></td>';
		echo '<td><input name="name[]" type="text" id="name[]" value="'.$rs['name'].'" size="10" title="军衔名称, 查询积分余额时可以看到"></td>';
		echo '<td><input name="itemid[]" type="text" id="itemid[]" value="'.$rs['itemid'].'" size="5" title="需要物品, 有此物品才可以升级军衔"/></td>';
		echo '<td><input name="reqhon[]" type="text" id="reqhon[]" value="'.$rs['reqhon'].'" size="10" title="需要达到设置的荣誉点数才可以升级军衔,不会扣除荣誉点数"/></td>';
		echo '<td><input name="reqjjc[]" type="text" id="reqjjc[]" value="'.$rs['reqjjc'].'" size="3" title="需要竞技点数"/></td>';
		echo '<td><input name="addhp[]" type="text" id="addhp[]" value="'.$rs['addhp'].'" size="6" title="增加玩家生命值"/></td>';
		echo '<td><input name="addmp[]" type="text" id="addmp[]" value="'.$rs['addmp'].'" size="6" title="增加玩家魔法值"/></td>';
		echo '<td><input name="addtf[]" type="text" id="addtf[]" value="'.$rs['addtf'].'" size="1" title="增加玩家天赋点"/></td>';
		echo '<td><input name="addliliang[]" type="text" id="addliliang[]" value="'.$rs['addliliang'].'" size="6"  title="增加玩家力量"/></td>';
		echo '<td><input name="addjingshen[]" type="text" id="addjingshen[]" value="'.$rs['addjingshen'].'" size="6" title="增加玩家精神"/></td>';
		echo '<td><input name="addnaili[]" type="text" id="addnaili[]" value="'.$rs['addnaili'].'" size="6" title="增加玩家耐力"/></td>';
		echo '<td><input name="addminjie[]" type="text" id="addminjie[]" value="'.$rs['addminjie'].'" size="6" title="增加玩家敏捷"/></td>';
		echo '<td><input name="addzhili[]" type="text" id="addzhili[]" value="'.$rs['addzhili'].'" size="6" title="增加玩家智力"/></td>';

		echo '<td><a href="?act=del&rank='.$rs['rank'].'"  onclick="return confirm(\'是否确定删除 id:'.$rs['rank'].'\');">删除</a></td>';
		echo '</tr>';
	}
				if($num>0) echo '<tr><td align="center" colspan="12" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
	<tr height="35">
	<td colspan="13" align="center"><input type="submit" name="Submit2" value="修改" /></td>
	</tr>
            </table>


     </form>

	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>