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
			if(!confirm("��ǰ��� "+entry.value+" �Ѿ�������������ʹ�ã�\r\n\r\n�Ƿ��޸�������ߵ���ϸ��ϢΪ�ո��������Ϣ?\r\n\r\n����: һ��ִ�У��㽫���ܳ����˲���."))
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;��Ʒ����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> �����޸�</div>

<?php
$sql = sy_item_show();
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
?>
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
  <tr bgcolor="#333333">
    <?php $jpg = file_exists('../icons/'.$rs['displayicon'].'.jpg')?$rs['displayicon']:404; ?>
	<td height="35" colspan="6" align="center"><font size=5>����: <img style="cursor:pointer"  width=40 height=40 align="absmiddle" src="../icons/<?php echo $jpg; ?>.jpg" onmouseover="showitem(event,'<?php echo $rs['entry']; ?>')" onmousemove="moveitem(event,'<?php echo $rs['entry']; ?>')" onmouseout="hideitem(event,'<?php echo $rs['entry']; ?>')">&nbsp;<?php echo $rs['name'];?></font></td>
  </tr>
   <tr height="25">
   <td align="center">���</td>
   <td align="left">&nbsp;<input name="entry" type="hidden" id="entry" value="<?php echo $rs['entry'];?>" size="10" readonly="true" />
    <input name="newentry" type="text" id="newentry" value="<?php echo $rs['entry'];?>" size="10" title="��ı��,������ܸ�����������"/></td>
   <td align="center">����/������</td>
   <td>&nbsp;<?php 
    $_class=$rs['class'];
    echo sy_select("class",$wow_class,$_class,'change(this,this.form.subclass)');?>
    <?php 
    	if($_class=='')
    		$_class=0;
    	echo sy_select("subclass",$wow_subclass[$_class],$rs['subclass']);?></td>
   <td align="center">���/����</td>
   <td>&nbsp;<?php echo sy_select("flags",$item_flags,$rs['Flags'],$rs['Flags']);?>
    <?php echo sy_select("FlagsExtra",$item_flags_extra,$rs['FlagsExtra'],$rs['FlagsExtra']);?></td>
  </tr>
  <tr height="25">
   <td align="center">��Ʒ����</td>
   <td>&nbsp;<input name="name" type="text" id="name" value="<?php echo $rs['name'];?>" size="30" /></td>
   <td align="center">Ʒ��/װ��λ��</td>
   <td align="left">&nbsp;<?php echo sy_select("Quality",$wow_quality,$rs['Quality'],$wow_color);?> 
   			<?php echo sy_select("InventoryType",$wow_pos,$rs['InventoryType']);?></td>
   <td align="center">ģ�ͱ��</td>
   <td align="left">&nbsp;<input name="displayid" type="text" id="displayid" value="<?php echo $rs['displayid'];?>" size="10" /><img style="cursor:pointer"  width=23 height=23 align="absmiddle" src="../icons/<?php echo $jpg; ?>.jpg"></td>
  </tr>
  <tr height="25">
   <td align="center">ʹ�õȼ�/��Ʒ�ȼ�</td>
   <td>&nbsp;<input name="RequiredLevel" type="text" id="RequiredLevel" value="<?php echo $rs['RequiredLevel'];?>" size="4" />-
   			<input name="ItemLevel" type="text" id="ItemLevel" value="<?php echo $rs['ItemLevel'];?>" size="4" /></td>
   <td align="center">����۸�/�����۸�</td>
   <td>&nbsp;<input name="BuyPrice" type="text" id="BuyPrice" value="<?php echo $rs['BuyPrice'];?>" size="10" />-
   			<input name="SellPrice" type="text" id="SellPrice" value="<?php echo $rs['SellPrice'];?>" size="10" /></td>
   <td align="center">����(����������Ч)</td>
   <td>&nbsp;<input name="ContainerSlots" type="text" id="ContainerSlots" value="<?php echo $rs['ContainerSlots'];?>" size="20" /></td>
  </tr>
  <tr height="25">
   <td align="center">��</td>
   <td>&nbsp;<?php echo sy_select("bonding",$wow_bonding,$rs['bonding']);?></td>
   <td align="center">��������</td>
   <td>&nbsp;<input name="BuyCount" type="text" id="BuyCount" value="<?php echo $rs['BuyCount'];?>" size="20" title="�������˳������һ��20��"/></td>
   <td align="center">���ӵ����/�ѵ���</td>
   <td>&nbsp;<input name="maxcount" type="text" id="maxcount" value="<?php echo $rs['maxcount'];?>" size="2" title="0=������ 1=Ψһ 200=��ӵ��200��"/>
   			<input name="stackable" type="text" id="stackable" value="<?php echo $rs['stackable'];?>" size="2" title="��Ʒ�ɶѵ�����"/></td>
  </tr>
  <tr style="background-color: #003D79">
   <td align="center" style="background-color: #003D79">������Ч��</td>
   <td style="background-color: #003D79" colspan="12">&nbsp;<input name="StatsCount" type="text" id="StatsCount" value="<?php echo $rs['StatsCount'];?>" size="5" title="��Ӧ�·�������Ч����,��10Ϊ����ȫ������"/></td>
  </tr>
  <div id="state">
  <tr height="25">
   <?php
  for($i=1;$i<=3;$i++)
  {
  ?>
   <td align="center" style="background-color: #003D79">��Ʒ����#<?php echo $i;?></td>
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
   <td align="center" style="background-color: #003D79">��Ʒ����#<?php echo $i;?></td>
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
   <td align="center" style="background-color: #003D79">��Ʒ����#<?php echo $i;?></td>
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
   <td align="center" style="background-color: #003D79">��Ʒ����#<?php echo $i;?></td>
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
   <td align="center" style="background-color: #4D0000">�˺�#<?php echo $i;?></td>
   <td align="left" style="background-color: #4D0000">&nbsp;<?php echo sy_select("dtype".$i,$wow_damage,$rs['dmg_type'.$i]);?></td>
   <td align="center" style="background-color: #4D0000">��Сֵ</td>
   <td align="left" style="background-color: #4D0000">&nbsp;<input name="dmg_min<?php echo $i;?>" type="text" id="dmg_min<?php echo $i;?>" value="<?php echo $rs['dmg_min'.$i];?>" size="10" /></td>
   <td align="center" style="background-color: #4D0000">���ֵ</td>
   <td align="left" style="background-color: #4D0000">&nbsp;<input name="dmg_max<?php echo $i;?>" type="text" id="dmg_max<?php echo $i;?>" value="<?php echo $rs['dmg_max'.$i];?>" size="10" /></td>
   </tr>
	<?php
	}
	?>
    <tr style="background-color: #4D0000">
   <td align="center" style="background-color: #4D0000">�������</td>
   <td style="background-color: #4D0000">&nbsp;<input name="delay" type="text" id="delay" value="<?php echo $rs['delay'];?>" size="10" title="1000����=1��"/> ����</td>
   <td align="center" style="background-color: #4D0000">Զ�̹�������</td>
   <td style="background-color: #4D0000">&nbsp;<input name="RangedModRange" type="text" id="RangedModRange" value="<?php echo $rs['RangedModRange'];?>" size="10" title="��ս=0 ����ǹе��Զ������=100 ���=3"/></td>
   <td align="center" style="background-color: #4D0000">��ҩ����</td>
   <td style="background-color: #4D0000"><input name="ammo_type" type="text" id="ammo_type" value="<?php echo $rs['ammo_type'];?>" size="10" title="��=0 ��ͷ=2 �ӵ�=3 �ɵ���=4"/></td>
  </tr>
  </div>
  <div id="arcane" style="display:none">
  <tr height="25">
   <td align="center">����</td><td align="center" colspan="12">
��ʥ����:&nbsp;<input name="holy_res" type="text" id="holy_res" value="<?php echo $rs['holy_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
���濹��:&nbsp;<input name="fire_res" type="text" id="fire_res" value="<?php echo $rs['fire_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
��Ȼ����:&nbsp;<input name="nature_res" type="text" id="nature_res" value="<?php echo $rs['nature_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
��˪����:&nbsp;<input name="frost_res" type="text" id="frost_res" value="<?php echo $rs['frost_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
��Ӱ����:&nbsp;<input name="shadow_res" type="text" id="shadow_res" value="<?php echo $rs['shadow_res'];?>" size="5" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
��������:&nbsp;<input name="arcane_res" type="text" id="arcane_res" value="<?php echo $rs['arcane_res'];?>" size="5" /></td>
  </tr>
  <tr height="25">
   <td align="center">����ֵ</td>
   <td>&nbsp;<input name="armor" type="text" id="armor" value="<?php echo $rs['armor'];?>" size="10" /> </td>
   <td align="center">��</td>
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
   <td align="center" style="background-color: #3A006F">����ID#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellid_<?php echo $i;?>" type="text" id="spellid_<?php echo $i;?>" value="<?php echo $rs['spellid_'.$i];?>" size="10" /></td>
   <td align="center" style="background-color: #3A006F">��������#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<?php echo sy_select("spelltrigger_".$i,$wow_use,$rs['spelltrigger_'.$i]);?></td>
   <td align="center" style="background-color: #3A006F">ʹ�ô���#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellcharges_<?php echo $i;?>" type="text" id="spellcharges_<?php echo $i;?>" value="<?php echo $rs['spellcharges_'.$i];?>" size="10" /></td>
   </tr>
	<tr style="background-color: #3A006F">
   <td align="center" style="background-color: #3A006F">��������#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellppmRate_<?php echo $i;?>" type="text" id="spellppmRate_<?php echo $i;?>" value="<?php echo $rs['spellppmRate_'.$i];?>" title="��������=����ʱ����  ����Ч" size="10" /></td>
   <td align="center" style="background-color: #3A006F">ħ������#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellcategory_<?php echo $i;?>" type="text" id="spellcategory_<?php echo $i;?>" value="<?php echo $rs['spellcategory_'.$i];?>" size="10" /></td>
   <td align="center" style="background-color: #3A006F">ħ����ȴʱ��#<?php echo $i;?></td>
   <td align="left" style="background-color: #3A006F">&nbsp;<input name="spellcategorycooldown_<?php echo $i;?>" type="text" id="spellcategorycooldown_<?php echo $i;?>" value="<?php echo $rs['spellcategorycooldown_'.$i];?>" size="10" /></td>
   </tr>
	<?php
	}
	?>
    </div>
	<div id="require">
	<tr height="25">
   <td align="center">װ������ְҵ</td>
   <td align="left">&nbsp;<input name="flag1" type="text" id="flag1" size="10"  value="<?php echo $rs['AllowableClass'];?>" readonly="true" onclick="javascript:openflag1('flag1',<?php echo intval($rs['AllowableClass']);?>);"/></td>
   <td align="center">װ����������</td>
   <td align="left">&nbsp;<input name="flag2" type="text" id="flag2" size="10"  value="<?php echo $rs['AllowableRace'];?>" readonly="true" onclick="javascript:openflag2('flag2',<?php echo intval($rs['AllowableRace']);?>);"/></td>
   <td align="center">&nbsp;</td>
   <td align="left">&nbsp;</td>
   </tr>
   <tr height="25">
   <td align="center">��Ҫ����</td>
   <td align="left">&nbsp;<input name="RequiredSkill" type="text" id="RequiredSkill" value="<?php echo $rs['RequiredSkill'];?>" size="10" /></td>
   <td align="center">��Ҫ���ܵȼ�</td>
   <td align="left">&nbsp;<input name="RequiredSkillRank" type="text" id="RequiredSkillRank" value="<?php echo $rs['RequiredSkillRank'];?>" size="10" /></td>
   <td align="center">��Ҫ����</td>
   <td align="left">&nbsp;<input name="requiredspell" type="text" id="requiredspell" value="<?php echo $rs['requiredspell'];?>" size="10" /></td>
   </tr>
   <tr height="25">
   <td align="center">��Ҫ�����ȼ�</td>
   <td align="left">&nbsp;<input name="requiredhonorrank" type="text" id="requiredhonorrank" value="<?php echo $rs['requiredhonorrank'];?>" size="10" /></td>
   <td align="center">��Ҫ����/�ȼ�</td>
   <td align="left" colspan="3">&nbsp;<?php echo sy_select("RequiredReputationFaction",$wow_faction2,$rs['RequiredReputationFaction']);?>-<?php echo sy_select("RequiredReputationRank",$wow_value,$rs['RequiredReputationRank']);?></td>
   </tr>
   </div>
  <tr height="25">
   <td align="center">���#1��ɫ</td>
   <td align="left">&nbsp;<?php echo sy_select("socketColor_1",$wow_slot,$rs['socketColor_1']);?></td>
   <td align="center">���#2��ɫ</td>
   <td align="left">&nbsp;<?php echo sy_select("socketColor_2",$wow_slot,$rs['socketColor_2']);?></td>
   <td align="center">���#3��ɫ</td>
   <td align="left">&nbsp;<?php echo sy_select("socketColor_3",$wow_slot,$rs['socketColor_3']);?></td>
   </tr>
   <tr height="25">
   <td align="center">��۽���</td>
   <td align="left">&nbsp;<?php echo sy_select("socketBonus",$SpellItemEnchantment,$rs['socketBonus']);?>
<!--<input name="flag3" type="text" id="flag3" size="10"  value="<?php echo $rs['socket_bonus'];?>" readonly="true" onclick="javascript:openflag3('flag3',<?php echo intval($rs['socketBonus']);?>);"/>--></td>
   <td align="center">��ʯ����</td>
   <td align="left">&nbsp;<?php echo sy_select("GemProperties",$SpellItemEnchantment,$rs['GemProperties']);?></td>
   <td align="center">��������</td>
   <td align="left">&nbsp;<input name="flag4" type="text" id="flag4" size="10"  value="<?php echo $rs['startquest'];?>" readonly="true" onclick="javascript:opentask('flag4',<?php echo intval($rs['startquest']);?>);"/></td>
   </tr>
   <tr height="25">
   <td align="center">��װ</td>
   <td align="left" colspan="3">&nbsp;<?php echo sy_select("itemset",$wow_suite,$rs['itemset']);?></td>
   <td align="center">����;ö�</td>
   <td align="left">&nbsp;<input name="MaxDurability" type="text" id="MaxDurability" size="10"  value="<?php echo $rs['MaxDurability'];?>"/></td>
   </tr>
   <tr height="25">
   <td align="center">��������</td>
   <td align="left" colspan="5">&nbsp;<textarea name="description"cols="100" rows="5" /><?php echo $rs['description'];?></textarea></td>
   </tr>
   <tr height="35">
	<td colspan="13" align="center"><input type="submit" name="Submit2" value="�޸�/���" />
		<input type="button" onclick="history.back();" name="Submit3" value="����" /></td>
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