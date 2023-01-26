<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_menu_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`_menu` ';
	$sql .= " WHERE (`id`='" .intval(trim($_REQUEST['id'])). "') ";
	$query = mysql_query($sql);
	header("location:gem.php");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;宝石和NPC菜单管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 说明>></div>
<table id="tab">
            <tr bgcolor="#353535">
              <td><br>"show_menu "=>"显示组菜单<font color=#FF9797>格式:show_menu 组</font>"<br>
"querytrade "=>"查询积分余额<font color=#FF9797>格式:querytrade</font>"<br>
"top todayKills "=>"今日击杀排行榜<font color=#FF9797>格式:top todayKills</font>"<br>
"top totalKills "=>"总击杀排行榜<font color=#FF9797>格式:top totalKills</font>"<br>
"top todayHonorPoints "=>"今日荣誉排行榜<font color=#FF9797>格式:top todayHonorPoints</font>"<br>
"top totalHonorPoints "=>"总荣誉排行榜<font color=#FF9797>格式:top totalHonorPoints</font>"<br>
"top money "=>"金币排行榜<font color=#FF9797>格式:top money</font>"<br>
"go "=>"传送到坐标<font color=#FF9797>格式:go 地图ID x坐标 y坐标 z坐标 o坐标</font>"<br>
"recievetrade "=>"领取积分<font color=#FF9797>格式:recievetrade</font>"<br>
"chongzhi "=>"使用充值卡充值<font color=#FF9797>格式:chongzhi</font>"<br>
"gold "=>"金币积分互兑换<font color=#FF9797>格式:gold</font>"<br>
"xp "=>"奖励经验<font color=#FF9797>格式:xp 奖励经验数值 最高等级</font>"<br>
"level "=>"提升等级<font color=#FF9797>格式:level 每次提升级别 最高级别</font>"<br>
"talent "=>"奖励天赋点<font color=#FF9797>格式:talent 奖励天赋点数</font>"<br>
"buyvipplayer "=>"购买会员权限会员等级相关信息请参照_vipinfo表<font color=#FF9797>格式:buyvipplayer VipLevel</font>"<br>
"skilllevel "=>"提升技能熟练度<font color=#FF9797>格式:skilllevel</font>"<br>
"show_bank "=>"打开银行<font color=#FF9797>格式:show_bank</font>"<br>
"reset_talent "=>"重置天赋<font color=#FF9797>格式:reset_talent</font>"<br>
"bind_pos "=>"炉石绑定<font color=#FF9797>格式:bind_pos</font>"<br>
"activate_taxi "=>"激活飞行点<font color=#FF9797>格式:activate_taxi</font>"<br>
"fix "=>"修理装备<font color=#FF9797>格式:fix</font>"<br>
"AutoPay "=>"领取泡点工资<font color=#FF9797>格式:AutoPay</font>"<br>
"rename "=>"角色重新命名<font color=#FF9797>格式:rename</font>"<br>
"instanceUnbind "=>"重置副本<font color=#FF9797>格式:instanceUnbind</font>"<br>
"ranks "=>"进入军衔提升系统<font color=#FF9797>格式:ranks</font>"<br>
"lushi "=>"使用炉石,传送到炉石绑定地点<font color=#FF9797>格式:lushi</font>"<br>
"ysxlsee "=>"查看元神修炼状态<font color=#FF9797>格式:ysxlsee</font>"<br>
"ysxl liliang "=>"力量元神修炼<font color=#FF9797>格式:ysxl liliang</font>"<br>
"ysxl mingjie "=>"敏捷元神修炼<font color=#FF9797>格式:ysxl mingjie</font>"<br>
"ysxl naili "=>"耐力元神修炼<font color=#FF9797>格式:ysxl naili</font>"<br>
"ysxl zhili "=>"智力元神修炼<font color=#FF9797>格式:ysxl zhili</font>"<br>
"ysxl jingshen "=>"精神元神修炼<font color=#FF9797>格式:ysxl jingshen</font>"<br>
"ranks up "=>"军衔提升关键指针(id=561不可更改)<font color=#FF9797>格式:ranks up</font>"<br>
"show_auction "=>"打开拍卖行<font color=#FF9797>格式:show_auction</font>"<br>
"castspell "=>"施放技能,可用于变形,召宠物,内域飞行等<font color=#FF9797>格式:castspell spellID</font>"<br>
"pvp_switch "=>"积分PVP开关<font color=#FF9797>格式:pvp_switch</font>"<br>
"returnm "=>"恢复变身,解除变身状态<font color=#FF9797>格式:returnm</font>"<br>
"change "=>"变身,利用怪物模型+模型大小实现玩家变身功能<font color=#FF9797>格式:change 模型ID 模型大小</font>"<br>
"DJ "=>"点歌服务<font color=#FF9797>格式:DJ 歌曲ID</font>"<br>
"unknow "=>"变性别<font color=#FF9797>格式:unknow</font>"<br>
"change_sex "=>"变性别<font color=#FF9797>格式:change_sex</font>"<br>
"back "=>"解卡,回出生地 <font color=#FF9797>格式:back</font>"<br>
"cjjk "=>"超级解卡,解卡战斗 <font color=#FF9797>格式:cjjk</font>"<br>
"cmd "=>"超级命令,可以使用所有现有的GM命令GM命令可以在command表中查找 <font color=#FF9797>格式:cmd [自己使用:0 可对目标使用:1] GM命令</font>"<br><br>&nbsp;</td>
            </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 宝石和NPC菜单查询结果>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>id</th>
                <th>图标</th>
        <th>标题</th>
        <th>排序</th>
        <th>组</th>
        <th>功能</th>
        <th>奖惩金币</th>
        <th>奖惩积分</th>
        <th>删除物品</th>
        <th>限定VIP</th>
        <th>删除</th>
              </tr>
				<?php
				$sql = _menu($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="id[]" type="hidden" id="id[]" value="'.$rs['id'].'" size="3"/>
		<input name="newid[]" type="text" id="newid[]" value="'.$rs['id'].'" size="3"/></td>';
		echo '<td><input name="icon[]" type="text" id="icon[]" value="'.$rs['icon'].'" size="1"/></td>';
		echo '<td><input name="itemtext[]" type="text" id="itemtext[]" value="'.$rs['itemtext'].'" size="65"/></td>';
		echo '<td><input name="sortid[]" type="text" id="sortid[]" value="'.$rs['sortid'].'" size="1"/></td>';
		echo '<td><input name="paneid[]" type="text" id="paneid[]" value="'.$rs['paneid'].'" size="3"/></td>';
$title='';
for($i = 0; $i < count($menu); $i ++){
	list($k, $v) = each(array_slice($menu, $i, 1));
	if(stristr($rs['action'],$k))
	{
		$title = $v;
		break;
	}
}


		
		echo '<td><input name="action[]" type="text" id="action[]" value="'.$rs['action'].'" size="30" title="'.$title.'"/></td>';
		echo '<td><input name="money[]" type="text" id="money[]" value="'.$rs['money'].'" size="6"/></td>';
		echo '<td><input name="jf[]" type="text" id="jf[]" value="'.$rs['jf'].'" size="6"/></td>';
		echo '<td><input name="delitem[]" type="text" id="delitem[]" value="'.$rs['delitem'].'" size="1"/></td>';
		echo '<td><input name="vip[]" type="text" id="vip[]" value="'.$rs['vip'].'" size="2"/></td>';
		echo '<td><a href="?act=del&id='.$rs['id'].'"  onclick="return confirm(\'是否确定删除 id:'.$rs['id'].' '.$rs['itemtext'].'\');">删除</a></td>';
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