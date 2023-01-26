<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_vipinfo_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`_vipinfo` ';
	$sql .= " WHERE (`viplevel`='" .intval(trim($_REQUEST['viplevel'])). "') ";
	$query = mysql_query($sql);
	header("location:vipinfo.php");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;会员等级管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 会员等级查询结果>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>VIP等级</th>
                <th>经验倍率</th>
        <th>爆率倍率</th>
        <th>购买VIP所需积分</th>
        <th>奖励金币</th>
        <th>奖励等级</th>
        <th>奖励泡点金币</th>
        <th>奖励物品</th>
        <th>奖励头衔</th>
        <th>聊天变色</th>
        <th>奖励天赋</th>
        <th>删除</th>
              </tr>
				<?php
				$sql = vipinfo($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="viplevel[]" type="hidden" id="viplevel[]" value="'.$rs['viplevel'].'" size="3"/>
			<input name="newviplevel[]" type="text" id="newviplevel[]" value="'.$rs['viplevel'].'" size="3" title="VIP等级, 不建议修改这里"/></td>';
		echo '<td><input name="xp_rate[]" type="text" id="xp_rate[]" value="'.round($rs['xp_rate'], 2).'" size="4" title="VIP玩家相对于普通玩家所提高的经验倍率"></td>';
		echo '<td><input name="loot_rate[]" type="text" id="loot_rate[]" value="'.round($rs['loot_rate'], 2).'" size="4" title="VIP玩家相对于普通玩家所提高的爆率倍率"/></td>';
		echo '<td><input name="buy_jf[]" type="text" id="buy_jf[]" value="'.$rs['buy_jf'].'" size="10" title="VIP提升只需要补差价"/></td>';
		echo '<td><input name="buy_money[]" type="text" id="buy_money[]" value="'.$rs['buy_money'].'" size="6" title="购买VIP后立即奖励金币给玩家"/></td>';
		echo '<td><input name="init_level[]" type="text" id="init_level[]" value="'.$rs['init_level'].'" size="1" title="购买VIP后立即提升等级到设定值"/></td>';
		echo '<td><input name="init_money[]" type="text" id="init_money[]" value="'.$rs['init_money'].'" size="6" /></td>';
		echo '<td><input name="init_item[]" type="text" id="init_item[]" value="'.$rs['init_item'].'" size="6" title="购买VIP后立即奖励物品给玩家, 奖励的物品只能设置一个 , 但是你可以奖励盒子, 盒子内可放更多奖励装备"/></td>';
		echo '<td><input name="honor_name[]" type="text" id="honor_name[]" value="'.$rs['honor_name'].'" size="15" title="定义会员头衔, 玩家在查询积分余额的时候可以看到自己的VIP头衔"/></td>';
		echo '<td><input name="chat_color[]" type="text" id="chat_color[]" value="'.$rs['chat_color'].'" size="10" title="定义会员聊天颜色, 在世界聊天的时候可以看到不同等级的VIP玩家拥有不同的聊天颜色"/></td>';
		echo '<td><input name="ex_talent[]" type="text" id="ex_talent[]" value="'.$rs['ex_talent'].'" size="1" title="购买VIP后奖励的天赋点"/></td>';
		echo '<td><a href="?act=del&viplevel='.$rs['viplevel'].'"  onclick="return confirm(\'是否确定删除 id:'.$rs['viplevel'].'\');">删除</a></td>';
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