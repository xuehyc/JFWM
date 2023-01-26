<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/SpellItemEnchantment.php');
include_once('../inc/suite.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_item_edit();
}
?>
<?php
include_once('../comm/head.php');
?>
<?php
$str = "<script>var item_subclass=new Array();";
for($i=0;$i<sizeof($wow_class);$i++)
{
		//$str .= "var item_subclass=new Array();";
		$str .= 'item_subclass['.$i.']="'.join("||",$wow_subclass[$i]).'";';
		//$str .= "item_class[]=item_subclass;";
}
$str .= "</script>";
echo $str;
?>
<script>
function XMLOBJ()
{
	var XMLHTTP=null;
	try
	{
		XMLHTTP=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			XMLHTTP=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				XMLHTTP=new XMLHttpRequest();
			}
			catch(e)
			{
			}
		}
	}
	return XMLHTTP;
}
function checkentry(id)
{
	var XML=XMLOBJ();
	XML.open("GET","check.php?id="+id+"&time="+Math.random(),false);
	XML.send(null);
	if(XML.readyState==4)
	{
		var s=XML.responseText;
		s=s.toLowerCase();
		return s=="1";
	}
}
function checkform(frm)
{
	with(frm)
	{
		if(entry.value!=''&&checkentry(entry.value))
		{
			if(!confirm("当前编号 "+entry.value+" 已经被其他道具所使用！\r\n\r\n是否修改这个道具的详细信息为刚刚输入的信息?\r\n\r\n警告: 一但执行，你将不能撤销此操作."))
			{
				return false;
			}
		}
	}
} 
function openflag1(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-230)/2;
	window.open("../comm/work.php?id="+id+"&value="+value,"","width=150,height=230,scrollbars=yes,left="+myLeft+",top="+myTop);
}
function openflag2(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-250)/2;
	window.open("../comm/nation.php?id="+id+"&value="+value,"","width=150,height=250,scrollbars=yes,left="+myLeft+",top="+myTop);
}
function openflag3(id,value)
{
	var myLeft = (screen.width-350)/2;
	var myTop = (screen.height-350)/2;
	window.open("flag3.php?id="+id+"&value="+value,"","width=350,height=350,scrollbars=no,left="+myLeft+",top="+myTop);
}
function opentask(id,value)
{
	var myLeft = (screen.width-350)/2;
	var myTop = (screen.height-400)/2;
	window.open("../comm/task.php?id="+id+"&value="+value,"","width=350,height=400,scrollbars=no,left="+myLeft+",top="+myTop);
}
function showdiv(id,flag)
{
	var div=document.getElementById(id);
	if(flag)
	{
		div.style.display="block";
	}
	else
	{
		div.style.display="none";
	}
}
function changediv(id)
{
	showdiv("state",false);
	showdiv("dmg",false);
	showdiv("arcane",false);
	showdiv("skin",false);
	showdiv(id,true);
}
function change(id,sel)
{
	sel.options.length=0;
	var items=item_subclass[id.value];
	items=items.split("||");
	for(var i=0;i<items.length;i++)
	{
		if(items[i]!="")
		sel.options.add(new Option(items[i],i))
	}
}
</script>
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="158" align="center" valign="top">
	<?php
	include_once('../inc/left.php');
	?>
	</td>
    <td valign="top">
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;物品管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 道具修改</div>

<?php
$sql = sy_item_show();
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
?>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
  <tr bgcolor="#333333">
    <?php $jpg = file_exists('../icons/'.$rs['displayicon'].'.jpg')?$rs['displayicon']:404; ?>
	<td height="35" colspan="6" align="center"><font size=5>名称: <img style="cursor:pointer"  width=40 height=40 align="absmiddle" src="../icons/<?php echo $jpg; ?>.jpg" onmouseover="showitem(event,'<?php echo $rs['entry']; ?>')" onmousemove="moveitem(event,'<?php echo $rs['entry']; ?>')" onmouseout="hideitem(event,'<?php echo $rs['entry']; ?>')">&nbsp;<?php echo $rs['name'];?></font></td>
  </tr>
   <tr height="25">
   <td align="center">编号</td>
   <td align="left">&nbsp;<input name="entry" type="hidden" id="entry" value="<?php echo $rs['entry'];?>" size="10" readonly="true" />
    <input name="newentry" type="text" id="newentry" value="<?php echo $rs['entry'];?>" size="10" title="勿改编号,否则可能覆盖已有数据"/></td>
   <td align="center">类型/子类型</td>
   <td>&nbsp;<?php 
    $_class=$rs['class'];
    echo sy_select("class",$wow_class,$_class,'change(this,this.form.subclass)');?>
    <?php 
    	if($_class=='')
    		$_class=0;
    	echo sy_select("subclass",$wow_subclass[$_class],$rs['subclass']);?></td>
   <td align="center">标记/额外</td>
   <td>&nbsp;<?php echo sy_select("flags",$item_flags,$rs['Flags'],$rs['Flags']);?>
    <?php echo sy_select("FlagsExtra",$item_flags_extra,$rs['FlagsExtra'],$rs['FlagsExtra']);?></td>
  </tr>
  <tr height="25">
   <td align="center">物品名称</td>
   <td>&nbsp;<input name="name" type="text" id="name" value="<?php echo $rs['name'];?>" size="30" /></td>
   <td align="center">品质/装备位置</td>
   <td align="left">&nbsp;<?php echo sy_select("Quality",$wow_quality,$rs['Quality'],$wow_color);?> 
   			<?php echo sy_select("InventoryType",$wow_pos,$rs['InventoryType']);?></td>
   <td align="center">模型编号</td>
   <td align="left">&nbsp;<input name="displayid" type="text" id="displayid" value="<?php echo $rs['displayid'];?>" size="10" /><img style="cursor:pointer"  width=23 height=23 align="absmiddle" src="../icons/<?php echo $jpg; ?>.jpg"></td>
  </tr>
  <tr height="25">
   <td align="center">使用等级/物品等级</td>
   <td>&nbsp;<input name="RequiredLevel" type="text" id="RequiredLevel" value="<?php echo $rs['RequiredLevel'];?>" size="4" />-
   			<input name="ItemLevel" type="text" id="ItemLevel" value="<?php echo $rs['ItemLevel'];?>" size="4" /></td>
   <td align="center">买入价格/卖出价格</td>
   <td>&nbsp;<input name="BuyPrice" type="text" id="BuyPrice" value="<?php echo $rs['BuyPrice'];?>" size="10" />-
   			<input name="SellPrice" type="text" id="SellPrice" value="<?php echo $rs['SellPrice'];?>" size="10" /></td>
   <td align="center">格子(是容器才有效)</td>
   <td>&nbsp;<input name="ContainerSlots" type="text" id="ContainerSlots" value="<?php echo $rs['ContainerSlots'];?>" size="20" /></td>
  </tr>
  <tr height="25">
   <td align="center">绑定</td>
   <td>&nbsp;<?php echo sy_select("bonding",$wow_bonding,$rs['bonding']);?></td>
   <td align="center">购买数量</td>
   <td>&nbsp;<input name="BuyCount" type="text" id="BuyCount" value="<?php echo $rs['BuyCount'];?>" size="20" title="例如商人出售面包一捆20个"/></td>
   <td align="center">最大拥有数/堆叠数</td>
   <td>&nbsp;<input name="maxcount" type="text" id="maxcount" value="<?php echo $rs['maxcount'];?>" size="2" title="0=无限制 1=唯一 200=可拥有200个"/>
   			<input name="stackable" type="text" id="stackable" value="<?php echo $rs['stackable'];?>" size="2" title="物品可堆叠数量"/></td>
  </tr>
  <tr style="background-color: #003D79">
   <td align="center" style="background-color: #003D79">属性有效数</td>
   <td style="background-color: #003D79" colspan="12">&nbsp;<input name="StatsCount" type="text" id="StatsCount" value="<?php echo $rs['StatsCount'];?>" size="5" title="对应下方属性有效个数,填10为加载全部属性"/></td>
  </tr>
  <div id="state">
  <tr height="25">
   <?php
  for($i=1;$i<=3;$i++)
  {
  ?>
   <td align="center" style="background-color: #003D79">物品属性#<?php echo $i;?></td>
   <td align="left" style="background-color: #003D79"><?php echo sy_select("stat_type".$i,$wow_state,$rs['stat_type'.$i]);?>
   <input name="stat_value<?php echo $i;?>" type="text" id="stat_value<?php echo $i;?>" value="<?php echo $rs['stat_value'.$i];?>" size="5" /></td>
   <?php
	}
	?>
    </tr>
	<tr style="background-color: #003D79">
   <?php
  for($i=4;$i<=6;$i++)
  {
  ?>
   <td align="center" style="background-color: #003D79">物品属性#<?php echo $i;?></td>
   <td align="left" style="background-color: #003D79"><?php echo sy_select("stat_type".$i,$wow_state,$rs['stat_type'.$i]);?>
   <input name="stat_value<?php echo $i;?>" type="text" id="stat_value<?php echo $i;?>" value="<?php echo $rs['stat_value'.$i];?>" size="5" /></td>
   <?php
	}
	?>
    </tr>
	<tr style="background-color: #003D79">
   <?php
  for($i=7;$i<=9;$i++)
  {
  ?>
   <td align="center" style="background-color: #003D79">物品属性#<?php echo $i;?></td>
   <td align="left" style="background-color: #003D79"><?php echo sy_select("stat_type".$i,$wow_state,$rs['stat_type'.$i]);?>
   <input name="stat_value<?php echo $i;?>" type="text" id="stat_value<?php echo $i;?>" value="<?php echo $rs['stat_value'.$i];?>" size="5" /></td>
   <?php
	}
	?>
    </tr>
	<tr style="background-color: #003D79" >
   <?php
  for($i=10;$i<=10;$i++)
  {
  ?>
   <td align="center" style="background-color: #003D79">物品属性#<?php echo $i;?></td>
   <td align="left" style="background-color: #003D79" colspan="12"><?php echo sy_select("stat_type".$i,$wow_state,$rs['stat_type'.$i]);?>
   <input name="stat_value<?php echo $i;?>" type="text" id="stat_value<?php echo $i;?>" value="<?php echo $rs['stat_value'.$i];?>" size="5" /></td>
   <?php
	}
	?>
    </tr>
	</div>
	<div id="dmg" style="display:none">
	<?php
  for($i=1;$i<=2;$i++)
  {
  ?>
   <tr style="background-color: #4D0000">
   <td align="center" style="background-color: #4D0000">伤害#<?php echo $i;?></td>
   <td align="left" style="background-color: #4D0000">&nbsp;<?php echo sy_select("dtype".$i,$wow_damage,$rs['dmg_type'.$i]);?></td>
   <td align="center" style="background-color: #4D0000">最小值</td>
   <td align="left" style="background-color: #4D0000">&nbsp;<input name="dmg_min<?php echo $i;?>" type="text" id="dmg_min<?php echo $i;?>" value="<?php echo $rs['dmg_min'.$i];?>" size="10" /></td>
   <td align="center" style="background-color: #4D0000">最大值</td>
   <td align="left" style="background-color: #4D0000">&nbsp;<input name="dmg_max<?php echo $i;?>" type="text" id="dmg_max<?php echo $i;?>" value="<?php echo $rs['dmg_max'.$i];?>" size="10" /></td>
   </tr>
	<?php
	}
	?>
    <tr style="background-color: #4D0000">
   <td align="center" style="background-color: #4D0000">攻击间隔</td>
   <td style="background-color: #4D0000">&nbsp;<input name="delay" type="text" id="delay" value="<?php echo $rs['delay'];?>" size="10" title="1000毫秒=1秒"/> 毫秒</td>
   <td align="center" style="background-color: #4D0000">远程攻击距离</td>
   <td style="background-color: #4D0000">&nbsp;<input name="RangedModRange" type="text" id="RangedModRange" value="<?php echo $rs['RangedModRange'];?>" size="10" title="近战=0 弓箭枪械等远程武器=100 鱼竿=3"/></td>
   <td align="center" style="background-color: #4D0000">弹药类型</td>
   <td style="background-color: #4D0000"><input name="ammo_type" type="text" id="ammo_type" value="<?php echo $rs['ammo_type'];?>" size="10" title="无=0 箭头=2 子弹=3 飞刀类=4"/></td>
  </tr>
  </div>
  <div id="arcane" style="display:none">
  <tr height="25">
   <td align="center">抗性</td><td align="center" colspan="12">
神圣抗性:&nbsp;<input name="holy_res" type="text" id="holy_res" value="<?php echo $rs['holy_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
火焰抗性:&nbsp;<input name="fire_res" type="text" id="fire_res" value="<?php echo $rs['fire_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
自然抗性:&nbsp;<input name="nature_res" type="text" id="nature_res" value="<?php echo $rs['nature_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
冰霜抗性:&nbsp;<input name="frost_res" type="text" id="frost_res" value="<?php echo $rs['frost_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
暗影抗性:&nbsp;<input name="shadow_res" type="text" id="shadow_res" value="<?php echo $rs['shadow_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
奥术抗性:&nbsp;<input name="arcane_res" type="text" id="arcane_res" value="<?php echo $rs['arcane_res'];?>" size="5" /></td>
  </tr>
  <tr height="25">
   <td align="center">护甲值</td>
   <td>&nbsp;<input name="armor" type="text" id="armor" value="<?php echo $rs['armor'];?>" size="10" /> </td>
   <td align="center">格挡</td>
   <td>&nbsp;<input name="block" type="text" id="block" value="<?php echo $rs['block'];?>" size="10" /></td>
   <td align="center">&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
  </div>
  <div id="skin">
  <?php
  for($i=1;$i<=5;$i++)
  {
  ?>
   <tr style="background-color: #3A006F">
   <td align="center" style="background-color: #3A006F">技能ID#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellid_<?php echo $i;?>" type="text" id="spellid_<?php echo $i;?>" value="<?php echo $rs['spellid_'.$i];?>" size="10" /></td>
   <td align="center" style="background-color: #3A006F">触发条件#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<?php echo sy_select("spelltrigger_".$i,$wow_use,$rs['spelltrigger_'.$i]);?></td>
   <td align="center" style="background-color: #3A006F">使用次数#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellcharges_<?php echo $i;?>" type="text" id="spellcharges_<?php echo $i;?>" value="<?php echo $rs['spellcharges_'.$i];?>" size="10" /></td>
   </tr>
	<tr style="background-color: #3A006F">
   <td align="center" style="background-color: #3A006F">触发几率#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellppmRate_<?php echo $i;?>" type="text" id="spellppmRate_<?php echo $i;?>" value="<?php echo $rs['spellppmRate_'.$i];?>" title="触发条件=击中时可能  才有效" size="10" /></td>
   <td align="center" style="background-color: #3A006F">魔法种类#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellcategory_<?php echo $i;?>" type="text" id="spellcategory_<?php echo $i;?>" value="<?php echo $rs['spellcategory_'.$i];?>" size="10" /></td>
   <td align="center" style="background-color: #3A006F">魔法冷却时间#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellcategorycooldown_<?php echo $i;?>" type="text" id="spellcategorycooldown_<?php echo $i;?>" value="<?php echo $rs['spellcategorycooldown_'.$i];?>" size="10" /></td>
   </tr>
	<?php
	}
	?>
    </div>
	<div id="require">
	<tr height="25">
   <td align="center">装备所需职业</td>
   <td align="left">&nbsp;<input name="flag1" type="text" id="flag1" size="10"  value="<?php echo $rs['AllowableClass'];?>" readonly="true" onclick="javascript:openflag1('flag1',<?php echo intval($rs['AllowableClass']);?>);"/></td>
   <td align="center">装备所需种族</td>
   <td align="left">&nbsp;<input name="flag2" type="text" id="flag2" size="10"  value="<?php echo $rs['AllowableRace'];?>" readonly="true" onclick="javascript:openflag2('flag2',<?php echo intval($rs['AllowableRace']);?>);"/></td>
   <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
   </tr>
   <tr height="25">
   <td align="center">需要技能</td>
   <td align="left">&nbsp;<input name="RequiredSkill" type="text" id="RequiredSkill" value="<?php echo $rs['RequiredSkill'];?>" size="10" /></td>
   <td align="center">需要技能等级</td>
   <td align="left">&nbsp;<input name="RequiredSkillRank" type="text" id="RequiredSkillRank" value="<?php echo $rs['RequiredSkillRank'];?>" size="10" /></td>
   <td align="center">需要法术</td>
   <td align="left">&nbsp;<input name="requiredspell" type="text" id="requiredspell" value="<?php echo $rs['requiredspell'];?>" size="10" /></td>
   </tr>
   <tr height="25">
   <td align="center">需要荣誉等级</td>
   <td align="left">&nbsp;<input name="requiredhonorrank" type="text" id="requiredhonorrank" value="<?php echo $rs['requiredhonorrank'];?>" size="10" /></td>
   <td align="center">需要声望/等级</td>
   <td align="left" colspan="3">&nbsp;<?php echo sy_select("RequiredReputationFaction",$wow_faction2,$rs['RequiredReputationFaction']);?>-<?php echo sy_select("RequiredReputationRank",$wow_value,$rs['RequiredReputationRank']);?></td>
   </tr>
   </div>
  <tr height="25">
   <td align="center">插槽#1颜色</td>
   <td align="left">&nbsp;<?php echo sy_select("socketColor_1",$wow_slot,$rs['socketColor_1']);?></td>
   <td align="center">插槽#2颜色</td>
   <td align="left">&nbsp;<?php echo sy_select("socketColor_2",$wow_slot,$rs['socketColor_2']);?></td>
   <td align="center">插槽#3颜色</td>
   <td align="left">&nbsp;<?php echo sy_select("socketColor_3",$wow_slot,$rs['socketColor_3']);?></td>
   </tr>
   <tr height="25">
   <td align="center">插槽奖励</td>
   <td align="left">&nbsp;<?php echo sy_select("socketBonus",$SpellItemEnchantment,$rs['socketBonus']);?>
<!--<input name="flag3" type="text" id="flag3" size="10"  value="<?php echo $rs['socket_bonus'];?>" readonly="true" onclick="javascript:openflag3('flag3',<?php echo intval($rs['socketBonus']);?>);"/>--></td>
   <td align="center">宝石属性</td>
   <td align="left">&nbsp;<?php echo sy_select("GemProperties",$SpellItemEnchantment,$rs['GemProperties']);?></td>
   <td align="center">触发任务</td>
   <td align="left">&nbsp;<input name="flag4" type="text" id="flag4" size="10"  value="<?php echo $rs['startquest'];?>" readonly="true" onclick="javascript:opentask('flag4',<?php echo intval($rs['startquest']);?>);"/></td>
   </tr>
   <tr height="25">
   <td align="center">套装</td>
   <td align="left" colspan="3">&nbsp;<?php echo sy_select("itemset",$wow_suite,$rs['itemset']);?></td>
   <td align="center">最大耐久度</td>
   <td align="left">&nbsp;<input name="MaxDurability" type="text" id="MaxDurability" size="10"  value="<?php echo $rs['MaxDurability'];?>"/></td>
   </tr>
   <tr height="25">
   <td align="center">附加描述</td>
   <td align="left" colspan="5">&nbsp;<textarea name="description"cols="100" rows="5" /><?php echo $rs['description'];?></textarea></td>
   </tr>
   <tr height="35">
	<td colspan="13" align="center"><input type="submit" name="Submit2" value="修改/添加" />
		<input type="button" onclick="history.back();" name="Submit3" value="返回" /></td>
  </tr>
     </form> </table></td>
  </tr>


</table>
<script>
var v1,v2,v3,c1,c2,c3;
c1=document.getElementById("lock");
v1=<?php echo intval($rs['lock_id']);?>;
c1.checked=v1=="1";
c2=document.getElementById("one");
v2=<?php echo intval($rs['Unique']);?>;
c2.checked=v2=="1";
</script>
<?php
include_once('../comm/foot.php');
?>