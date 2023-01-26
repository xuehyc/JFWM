<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_item_up_list_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`_item_up_list` ';
	$sql .= " WHERE (`key_item`='" .intval(trim($_REQUEST['key_item'])). "') ";
	$query = mysql_query($sql);
	header("location:item_up_list.php");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;物品合成管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 物品合成查询结果>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>触发物品</th>
                <th>目标物品</th>
        <th>材料1</th>
        <th>数量1</th>
        <th>材料2</th>
        <th>数量2</th>
        <th>材料3</th>
        <th>数量3</th>
        <th>材料4</th>
        <th>数量4</th>
        <th>材料5</th>
        <th>数量5</th>
        <th>需要金币</th>
        <th>需要积分</th>
        <th>成功率</th>
        <th>删除</th>
              </tr>
				<?php
				$sql = item_up_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="key_item[]" type="hidden" id="key_item[]" value="'.$rs['key_item'].'" size="1"/>
			<input name="newkey_item[]" type="text" id="newkey_item[]" value="'.$rs['key_item'].'" size="5" title="弹出合成菜单的触发物品 {用合成宝石点击触发物品弹出合成菜单}, 触发物品即合成前的物品, 目标物品为合成后的物品"/></td>';
		echo '<td><input name="dst_item[]" type="text" id="dst_item[]" value="'.$rs['dst_item'].'" size="5" title="目标物品 {合成成功后奖励该物品, 触发物品会被删除}, 触发物品即合成前的物品, 目标物品为合成后的物品"></td>';
		echo '<td><input name="item1[]" type="text" id="item1[]" value="'.$rs['item1'].'" size="5" title="需要材料物品1"/></td>';
		echo '<td><input name="count1[]" type="text" id="count1[]" value="'.$rs['count1'].'" size="1" title="需要材料物品1的数量"/></td>';
		echo '<td><input name="item2[]" type="text" id="item2[]" value="'.$rs['item2'].'" size="5" title="需要材料物品2"/></td>';
		echo '<td><input name="count2[]" type="text" id="count2[]" value="'.$rs['count2'].'" size="1" title="需要材料物品2的数量"/></td>';
		echo '<td><input name="item3[]" type="text" id="item3[]" value="'.$rs['item3'].'" size="5" title="需要材料物品3"/></td>';
		echo '<td><input name="count3[]" type="text" id="count3[]" value="'.$rs['count3'].'" size="1" title="需要材料物品3的数量"/></td>';
		echo '<td><input name="item4[]" type="text" id="item4[]" value="'.$rs['item4'].'" size="5"  title="需要材料物品4"/></td>';
		echo '<td><input name="count4[]" type="text" id="count4[]" value="'.$rs['count4'].'" size="1" title="需要材料物品4的数量"/></td>';
		echo '<td><input name="item5[]" type="text" id="item5[]" value="'.$rs['item5'].'" size="5" title="需要材料物品5"/></td>';
		echo '<td><input name="count5[]" type="text" id="count5[]" value="'.$rs['count5'].'" size="1" title="需要材料物品5的数量"/></td>';
		echo '<td><input name="money[]" type="text" id="money[]" value="'.$rs['money'].'" size="6" title="合成物品时损耗的金币数"/></td>';
		echo '<td><input name="mb[]" type="text" id="mb[]" value="'.$rs['mb'].'" size="6" title="合成物品时损耗的积分数"/></td>';
		echo '<td><input name="prob[]" type="text" id="prob[]" value="'.$rs['prob'].'" size="3" title="合成物品的成功率, 注意:当玩家拥有<font color=red>幸运宝石</font>时,每个幸运宝石能增加1%的合成成功率. 拥有<font color=red>禁锢宝石</font>则在物品合成失败后保证触发物品不被摧毁!"/></td>';

		echo '<td><a href="?act=del&key_item='.$rs['key_item'].'"  onclick="return confirm(\'是否确定删除 key_item:'.$rs['key_item'].'\');">删除</a></td>';
		echo '</tr>';
	}
				if($num>0) echo '<tr><td align="center" colspan="16" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
	<tr height="35">
	<td colspan="16" align="center"><input type="submit" name="Submit2" value="修改" /></td>
	</tr>
            </table>


     </form>

	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>