<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_npc_edit();
}
?>
<?php
include_once('../comm/head.php');
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
			if(!confirm("当前编号 "+entry.value+" 已经被其他NPC所使用！\r\n\r\n是否修改这个NPC的详细信息为刚刚输入的信息?\r\n\r\n警告: 一但执行，你将不能撤销此操作."))
			{
				return false;
			}
		}
	}
} 
function openflag(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-350)/2;
	window.open("flag.php?id="+id+"&value="+value,"","width=150,height=350,scrollbars=yes,left="+myLeft+",top="+myTop);
}
</script>
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
	<div id="rightTop"><input id="showHide" type="button"> NPC修改</div>

<?php
$sql = sy_npc_show();
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
?>
&nbsp;
<table id="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">NPC编号</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="entry" type="text" id="entry" value="<?php echo $rs['entry'];?>" size="10" /></td>
   <td width="110" align="center" bgcolor="#353535">NPC名称</td>
   <td bgcolor="#353535">&nbsp;<input name="name" type="text" id="name" value="<?php echo $rs['name'];?>" size="20" /></td>
   <td width="110" align="center">NPC称谓</td>
   <td bgcolor="#353535">&nbsp;<input name="subname" type="text" id="subname" value="<?php echo $rs['subname'];?>" size="20" /></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">类型</td>
   <td align="left" bgcolor="#353535">&nbsp;<?php echo sy_select("type",$wow_type,$rs['type']);?></td>
   <td width="110" align="center" bgcolor="#353535">家族</td>
   <td bgcolor="#353535">&nbsp;<?php echo sy_select("family",$wow_family,$rs['family']);?></td>
   <td width="110" align="center">等级</td>
   <td bgcolor="#353535">&nbsp;<?php echo sy_select("rank",$wow_rank,$rs['rank']);?></td>
  </tr>
    <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">模型1-4</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="modelid1" type="text" id="modelid1" value="<?php echo $rs['modelid1'];?>" size="4" />-
    <input name="modelid2" type="text" id="modelid2" value="<?php echo $rs['modelid2'];?>" size="4" />-
    <input name="modelid3" type="text" id="modelid3" value="<?php echo $rs['modelid3'];?>" size="4" />-
    <input name="modelid4" type="text" id="modelid4" value="<?php echo $rs['modelid4'];?>" size="4" /></td>
   <td width="110" align="center" bgcolor="#353535">爆率/偷取/拨皮</td>
   <td bgcolor="#353535">&nbsp;<input name="lootid" type="text" id="lootid" value="<?php echo $rs['lootid'];?>" size="4" />-
    <input name="pickpocketloot" type="text" id="pickpocketloot" value="<?php echo $rs['pickpocketloot'];?>" size="4" />-
    <input name="skinloot" type="text" id="skinloot" value="<?php echo $rs['skinloot'];?>" size="4" /></td>
   <td width="110" align="center">金币掉落</td>
   <td bgcolor="#353535">&nbsp;<input name="mingold" type="text" id="mingold" value="<?php echo $rs['mingold'];?>" size="10" />-
    <input name="maxgold" type="text" id="maxgold" value="<?php echo $rs['maxgold'];?>" size="10" /></td>
    </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">等级范围</td>
   <td align="left" bgcolor="#353535">&nbsp;<input name="minlevel" type="text" id="minlevel" value="<?php echo $rs['minlevel'];?>" size="5">
   - 
   <input name="maxlevel" type="text" id="maxlevel" value="<?php echo $rs['maxlevel'];?>" size="5"></td>
   <td width="110" align="center" bgcolor="#353535">HP/MP/护甲(倍率)</td>
   <td bgcolor="#353535">&nbsp;<input name="Health_mod" value="<?php echo $rs['Health_mod'];?>" type="text" id="Health_mod" size="5">-
    <input name="Mana_mod" value="<?php echo $rs['Mana_mod'];?>" type="text" id="Mana_mod" size="5">-
    <input name="Armor_mod" value="<?php echo $rs['Armor_mod'];?>" type="text" id="Armor_mod" size="5">
	</td>
   <td width="110" align="center">移动方式</td>
   <td bgcolor="#353535">&nbsp;<?php echo sy_select("MovementType",$MovementType,$rs['MovementType']);?>
</td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">声望/阵营</td>
   <td colspan="3" bgcolor="#353535">&nbsp;<?php echo sy_select("faction_A",$wow_faction,$rs['faction_A']);?>-
    <?php echo sy_select("faction_H",$wow_faction,$rs['faction_H']);?></td>
   <td width="110" align="center">npcflag</td>
   <td bgcolor="#353535">&nbsp;<input name="npcflag" value="<?php echo $rs['npcflag'];?>" type="text" id="npcflag" size="5"></td>
  </tr>
               <tr height="25" bgcolor="#353535">
                 <td width="110" align="center" bgcolor="#353535">攻击间隔</td>
                 <td bgcolor="#353535">&nbsp;<input name="baseattacktime" type="text" id="baseattacktime" size="5" value="<?php echo $rs['baseattacktime'];?>">-
    <input name="rangeattacktime" type="text" id="rangeattacktime" size="5" value="<?php echo $rs['rangeattacktime'];?>"></td>
                 <td width="110" align="center" bgcolor="#353535">伤害</td>
                 <td bgcolor="#353535">&nbsp;<input name="mindmg" type="text" id="mindmg" size="5" value="<?php echo $rs['mindmg'];?>"> 
                   -
                     <input name="maxdmg" type="text" id="maxdmg" size="5" value="<?php echo $rs['maxdmg'];?>"></td>
                 <td width="110" align="center">模型放大倍数</td>
                 <td bgcolor="#353535">&nbsp;<input name="scale" type="text" id="scale" size="10" value="<?php echo $rs['scale'];?>" /></td>
               </tr>
			  <tr height="25" bgcolor="#353535">
                 <td width="110" align="center" bgcolor="#353535">装备模型ID</td>
                 <td bgcolor="#353535">&nbsp;<input name="equipment_id" type="text" id="equipment_id" size="5" value="<?php echo $rs['equipment_id'];?>" /></td>
                    <td width="110" align="center" bgcolor="#353535">法术</td>
   <td colspan="3" bgcolor="#353535">&nbsp;<input name="spell1" type="text" id="spell1" value="<?php echo $rs['spell1'];?>" size="4" />-
    <input name="spell2" type="text" id="spell2" value="<?php echo $rs['spell2'];?>" size="4" />-
    <input name="spell3" type="text" id="spell3" value="<?php echo $rs['spell3'];?>" size="4" />-
    <input name="spell4" type="text" id="spell4" value="<?php echo $rs['spell4'];?>" size="4" />-
    <input name="spell5" type="text" id="spell5" value="<?php echo $rs['spell5'];?>" size="4" />-
    <input name="spell6" type="text" id="spell6" value="<?php echo $rs['spell6'];?>" size="4" />-
    <input name="spell7" type="text" id="spell7" value="<?php echo $rs['spell7'];?>" size="4" />-
    <input name="spell8" type="text" id="spell8" value="<?php echo $rs['spell8'];?>" size="4" /></td>
               </tr>
			   <tr height="35" bgcolor="#353535">
                <td colspan="6" align="center"><input type="submit" name="Submit2" value="修改/添加" />
                <input type="button" onclick="history.back();" name="Submit3" value="返回" /></td>
              </tr>
      </form></table></td>
  </tr>


</table>
<script>
var v1,v2,v3,c1,c2,c3;
c1=document.getElementById("cb1");
v1=<?php echo intval($rs['civilian']);?>;
c1.checked=v1=="1";
c2=document.getElementById("cb2");
v2=<?php echo intval($rs['leader']);?>;
c2.checked=v2=="1";
c3=document.getElementById("cb3");
v3=<?php echo intval($rs['rank']);?>;
cb3.checked=v3=="1";
</script>
<?php
include_once('../comm/foot.php');
?>