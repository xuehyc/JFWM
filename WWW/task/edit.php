<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/zone.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_task_edit();
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
			if(!confirm("��ǰ��� "+entry.value+" �Ѿ�������NPC��ʹ�ã�\r\n\r\n�Ƿ��޸����NPC����ϸ��ϢΪ�ո��������Ϣ?\r\n\r\n����: һ��ִ�У��㽫���ܳ����˲���."))
			{
				return false;
			}
		}
	}
} 
function openwork(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-230)/2;
	window.open("../comm/work.php?id="+id+"&value="+value,"","width=150,height=230,scrollbars=yes,left="+myLeft+",top="+myTop);
}
function opennation(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-250)/2;
	window.open("../comm/nation.php?id="+id+"&value="+value,"","width=150,height=250,scrollbars=yes,left="+myLeft+",top="+myTop);
}
function openflag1(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-200)/2;
	window.open("flag1.php?id="+id+"&value="+value,"","width=150,height=200,scrollbars=yes,left="+myLeft+",top="+myTop);
}
function openflag2(id,value)
{
	var myLeft = (screen.width-150)/2;
	var myTop = (screen.height-200)/2;
	window.open("flag2.php?id="+id+"&value="+value,"","width=150,height=200,scrollbars=yes,left="+myLeft+",top="+myTop);
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
function openitem(id,value)
{
	var myLeft = (screen.width-350)/2;
	var myTop = (screen.height-400)/2;
	window.open("../comm/item.php?id="+id+"&value="+value,"","width=350,height=400,scrollbars=no,left="+myLeft+",top="+myTop);
}
function opennpc(id,value)
{
	var myLeft = (screen.width-350)/2;
	var myTop = (screen.height-400)/2;
	window.open("../comm/npc.php?id="+id+"&value="+value,"","width=350,height=400,scrollbars=no,left="+myLeft+",top="+myTop);
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;�������</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> �����޸�</div>

<?php
$sql = sy_task_show();
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
?>
&nbsp;
<table id="tab" name="tab">
<form action="?act=save" method="post" onSubmit="return checkform(this);">
   <tr>
   <td align="center">������</td>
   <td>&nbsp;<input name="entry" type="text" id="entry" value="<?php echo $rs['entry'];?>" size="10" title="������"/></td>
   <td align="center">��������</td>
   <td colspan="3">&nbsp;<input name="name" type="text" id="name" value="<?php echo $rs['Title'];?>" size="50" /></td>
  </tr>
  <tr>
   <td align="center">��������</td>
   <td>&nbsp;<?php echo sy_select("zone",$wow_zone,$rs['ZoneOrSort']);?> <a href="#" title="*�����������������ֻ��ѡһ��">��</a></td>
   <td align="center">��������</td>
   <td colspan="3">&nbsp;<?php echo sy_select("class",$wow_task,$rs['ZoneOrSort']);?></td>  
   </tr>

    <tr>
   <td align="center">ǰһ����</td>
   <td>&nbsp;<input name="prev" type="text" id="prev" size="10"  value="<?php echo $rs['PrevQuestId'];?>" onclick="javascript:opentask('prev',<?php echo intval($rs['PrevQuestId']);?>);"/></td>
   <td align="center">��һ����</td>
   <td>&nbsp;<input name="next" type="text" id="next" size="10"  value="<?php echo $rs['NextQuestId'];?>" onclick="javascript:opentask('next',<?php echo intval($rs['NextQuestId']);?>);"/></td>
   <td align="center">ʱ������</td>
   <td>&nbsp;<input name="time" type="text" id="time" size="10" value="<?php echo $rs['LimitTime'];?>">&nbsp;��<td>
   </tr>
  <tr>
   <td align="center">����ȼ�</td>
   <td>&nbsp;<input name="QuestLevel" type="text" id="QuestLevel" value="<?php echo $rs['QuestLevel'];?>" size="10"></td>
   <td align="center">��С�ȼ�/���ȼ�</td>
   <td>&nbsp;<input name="minlevel" type="text" id="minlevel" value="<?php echo $rs['MinLevel'];?>" size="10"> 
    <input name="MaxLevel" type="text" id="MaxLevel" value="<?php echo $rs['MaxLevel'];?>" size="10"></td>
   <td width="110" align="center"></td>
   <td>&nbsp;</td>
  </tr>
  <tr>
   <td width="110" align="center">��־</td>
   <td>&nbsp;<input name="tflag" type="text" id="tflag" size="10"  value="<?php echo $rs['QuestFlags'];?>" onclick="javascript:openflag1('tflag',<?php echo intval($rs['QuestFlags']);?>);"/></td>
   <td width="110" align="center">��������</td>
   <td>&nbsp;<input name="sflag" type="text" id="sflag" size="10"  value="<?php echo $rs['SpecialFlags'];?>" onclick="javascript:openflag2('sflag',<?php echo intval($rs['SpecialFlags']);?>);"/></td>
   <td width="110" align="center">����</td>
   <td>&nbsp;<?php echo sy_select("event",$wow_event,$rs['Type']);?></td>
  </tr>
  <tr>
	<td colspan="6">��������</td>
  </tr>
  <tr height="35">
   <td width="110" align="center">��������</td>
   <td colspan="5">&nbsp;<textarea name="text1" cols="70" rows="4" id="text1"><?php echo $rs['Details'];?></textarea></td>
  </tr>
    <tr height="35">
   <td width="110" align="center">����Ŀ������</td>
   <td colspan="5">&nbsp;<textarea name="text2" cols="70" rows="4" id="text2"><?php echo $rs['Objectives'];?></textarea></td>
  </tr>
    <tr height="35">
   <td width="110" align="center">�����������</td>
   <td colspan="5">&nbsp;<textarea name="text3" cols="70" rows="4" id="text3"><?php echo $rs['OfferRewardText'];?></textarea></td>
  </tr>
    <tr height="35">
   <td width="110" align="center">δ�������</td>
   <td colspan="5">&nbsp;<textarea name="text4" cols="70" rows="4" id="text4"><?php echo $rs['RequestItemsText'];?></textarea></td>
  </tr>
   <tr height="35">
   <td width="110" align="center">�����������</td>
   <td colspan="5">&nbsp;<textarea name="text5" cols="70" rows="4" id="text5"><?php echo $rs['EndText'];?></textarea></td>
  </tr>
  <tr height="35">
   <td width="110" align="center">����Ŀ�����1</td>
   <td colspan="5">&nbsp;<input name="ObjectiveText1" type="text" id="ObjectiveText1" value="<?php echo $rs['ObjectiveText1'];?>" size="50" /></td>
  </tr>
    <tr height="35">
   <td width="110" align="center">����Ŀ�����2</td>
   <td colspan="5">&nbsp;<input name="ObjectiveText2" type="text" id="ObjectiveText2" value="<?php echo $rs['ObjectiveText2'];?>" size="50" /></td>
  </tr>
    <tr height="35">
   <td width="110" align="center">����Ŀ�����3</td>
   <td colspan="5">&nbsp;<input name="ObjectiveText3" type="text" id="ObjectiveText3" value="<?php echo $rs['ObjectiveText3'];?>" size="50" /></td>
  </tr>
    <tr height="35">
   <td width="110" align="center">����Ŀ�����4</td>
   <td colspan="5">&nbsp;<input name="ObjectiveText4" type="text" id="ObjectiveText4" value="<?php echo $rs['ObjectiveText4'];?>" size="50" /></td>
  </tr>
  <tr>
	<td colspan="6">����Ҫ��</td>
  </tr>
  <tr>
   <td width="80" align="center"> ���輼��</td>
   <td>&nbsp;<?php echo sy_select("SkillOrClassMask",$wow_skill,$rs['SkillOrClassMask']);?> <a href="#" title="*���輼�ܺ�����ְҵֻ��ѡһ��">��</a></td>
   <td width="80" align="center"> ����ְҵ</td>
   <td>&nbsp;<input name="work" type="text" id="work" size="10"  value="<?php echo $rs['SkillOrClassMask'];?>" onclick="javascript:openwork('work',<?php echo intval($rs['RequiredClass']);?>);"/></td>
   <td width="80" align="center">��������</td>
   <td><input name="nation" type="text" id="nation" size="10"  value="<?php echo $rs['RequiredRaces'];?>" onclick="javascript:opennation('nation',<?php echo intval($rs['RequiredRaces']);?>);"/></td>
   </tr>
  <!-- <tr>
   <td align="center">��Ҫ������#1</td>
   <td colspan="2">&nbsp;<input name="task1" type="text" id="task1" size="10"  value="<?php echo $rs['RequiredQuest1'];?>" onclick="javascript:opentask('task1',<?php echo intval($rs['RequiredQuest1']);?>);"/>
   ��Ҫ������#2&nbsp;<input name="task2" type="text" id="task2" size="10"  value="<?php echo $rs['RequiredQuest2'];?>" onclick="javascript:opentask('task2',<?php echo intval($rs['RequiredQuest2']);?>);"/></td>
   <td align="center">��Ҫ������#3</td>
   <td colspan="2">&nbsp;<input name="task3" type="text" id="task3" size="10"  value="<?php echo $rs['RequiredQuest3'];?>" onclick="javascript:opentask('task3',<?php echo intval($rs['RequiredQuest3']);?>);"/>
   ��Ҫ������#4&nbsp;<input name="task4" type="text" id="task4" size="10"  value="<?php echo $rs['RequiredQuest4'];?>" onclick="javascript:opentask('task4',<?php echo intval($rs['RequiredQuest4']);?>);"/></td>
   </tr>-->
   <tr>
	<td colspan="6">��������</td>
  </tr>
 <tr>
   <td align="center">��Ҫ��Ʒ#1:</td>
   <td><input name="rt1" type="text" id="rt1" size="4"  value="<?php echo $rs['ReqItemId1'];?>" onclick="javascript:openitem('rt1',<?php echo intval($rs['ReqItemId1']);?>);"/>
   &nbsp;������<input name="rc1" type="text" id="rc1" size="2"  value="<?php echo $rs['ReqItemCount1'];?>"/></td>
   <td align="center">��Ҫ��Ʒ#2:</td>
   <td><input name="rt2" type="text" id="rt2" size="4"  value="<?php echo $rs['ReqItemId2'];?>" onclick="javascript:openitem('rt2',<?php echo intval($rs['ReqItemId2']);?>);"/>
   &nbsp;������<input name="rc2" type="text" id="rc2" size="2"  value="<?php echo $rs['ReqItemCount2'];?>"/></td>
   <td align="center">��Ҫ��Ʒ#3:</td>
   <td><input name="rt3" type="text" id="rt3" size="4"  value="<?php echo $rs['ReqItemId3'];?>" onclick="javascript:openitem('rt3',<?php echo intval($rs['ReqItemId3']);?>);"/>
   &nbsp;������<input name="rc3" type="text" id="rc3" size="2"  value="<?php echo $rs['ReqItemCount3'];?>"/></td> </tr>
  <tr>
   <td align="center">��Ҫ��Ʒ#4:</td>
   <td><input name="rt4" type="text" id="rt4" size="4"  value="<?php echo $rs['ReqItemId4'];?>" onclick="javascript:openitem('rt4',<?php echo intval($rs['ReqItemId4']);?>);"/>
   &nbsp;������<input name="rc4" type="text" id="rc4" size="2"  value="<?php echo $rs['ReqItemCount4'];?>"/></td>
   <td align="center">��Ҫ��Ʒ#5:</td>
   <td><input name="rt5" type="text" id="rt5" size="4"  value="<?php echo $rs['ReqItemId5'];?>" onclick="javascript:openitem('rt5',<?php echo intval($rs['ReqItemId5']);?>);"/>
   &nbsp;������<input name="rc5" type="text" id="rc5" size="2"  value="<?php echo $rs['ReqItemCount5'];?>"/></td>
   <td align="center">��Ҫ��Ʒ#6:</td>
   <td><input name="rt6" type="text" id="rt6" size="4"  value="<?php echo $rs['ReqItemId6'];?>" onclick="javascript:openitem('rt6',<?php echo intval($rs['ReqItemId6']);?>);"/>
   &nbsp;������<input name="rc6" type="text" id="rc6" size="2"  value="<?php echo $rs['ReqItemCount6'];?>"/></td>
   </tr>
  <tr>
   <td align="center">���败����Ʒ</td>
   <td colspan="2">&nbsp;<input name="st" type="text" id="st" size="10"  value="<?php echo $rs['SrcItemId'];?>" onclick="javascript:openitem('st',<?php echo intval($rs['SrcItemId']);?>);" title="��������������������Ʒ. ��ұ���ӵ�и���Ʒ���������� (��Ʒ��Ϊ���񴥷�������Ʒ), <br>������������Ҫ����������񴥷���Ʒ��ID��������ѡ��"/>
   &nbsp;������<input name="sc" type="text" id="sc" size="5"  value="<?php echo $rs['SrcItemCount'];?>"/></td>
   <td align="center">&nbsp;</td>
   <td colspan="2">&nbsp;</td>
   </tr><!--
  <tr>
	<td colspan="6">�������(��Ʒ�ͽ��)</td>
  </tr>
 <tr>
   <td align="center">���������Ʒ#1</td>
   <td colspan="2">&nbsp;<input name="frt1" type="text" id="frt1" size="10"  value="<?php echo $rs['ReqItemId1'];?>" onclick="javascript:openitem('frt1',<?php echo intval($rs['ReqItemId1']);?>);"/>
   &nbsp;������<input name="frc1" type="text" id="frc1" size="5"  value="<?php echo $rs['ReqItemCount1'];?>"/></td>
   <td align="center">���������Ʒ#2</td>
   <td colspan="2">&nbsp;<input name="frt2" type="text" id="frt2" size="10"  value="<?php echo $rs['ReqItemId2'];?>" onclick="javascript:openitem('frt2',<?php echo intval($rs['ReqItemId2']);?>);"/>
   &nbsp;������<input name="frc2" type="text" id="frc2" size="5"  value="<?php echo $rs['ReqItemCount2'];?>"/></td>
   </tr>
  <tr>
   <td align="center">���������Ʒ#3</td>
   <td colspan="2">&nbsp;<input name="frt3" type="text" id="frt3" size="10"  value="<?php echo $rs['ReqItemId3'];?>" onclick="javascript:openitem('frt3',<?php echo intval($rs['ReqItemId3']);?>);"/>
   &nbsp;������<input name="frc3" type="text" id="frc3" size="5"  value="<?php echo $rs['ReqItemCount3'];?>"/></td>
   <td align="center">���������Ʒ#4</td>
   <td colspan="2">&nbsp;<input name="frt4" type="text" id="frt4" size="10"  value="<?php echo $rs['ReqItemId4'];?>" onclick="javascript:openitem('frt4',<?php echo intval($rs['ReqItemId4']);?>);"/>
   &nbsp;������<input name="frc4" type="text" id="frc4" size="5"  value="<?php echo $rs['ReqItemCount4'];?>"/></td>
   </tr>-->
  <tr>
   <td align="center">��Ҫ�������</td>
   <td colspan="2">&nbsp;<input name="RewOrReqMoney" type="text" id="RewOrReqMoney" size="10"  value="<?php echo $rs['RewOrReqMoney'];?>" title="����Ϊ�������,����Ϊ��Ҫ���"/></td>
   <td align="center">&nbsp;</td>
   <td colspan="2">&nbsp;</td>
   </tr>
  <tr>
	<td colspan="6">�������(NPC)</td>
  </tr>
 <tr>
   <td align="center">��ɱ����#1</td>
   <td colspan="2">&nbsp;<input name="npc1" type="text" id="npc1" size="5"  value="<?php echo $rs['ReqCreatureOrGOId1'];?>" onclick="javascript:opennpc('npc1',<?php echo intval($rs['ReqKillMobOrGOId1']);?>);"/>
   &nbsp;������<input name="n1" type="text" id="n1" size="1"  value="<?php echo $rs['ReqCreatureOrGOCount1'];?>"/>
   &nbsp;��ż��ܣ�<input name="ReqSpellCast1" type="text" id="ReqSpellCast1" size="5"  value="<?php echo $rs['ReqSpellCast1'];?>"/>
   </td>
   <td align="center">��ɱ����#2</td>
   <td colspan="2">&nbsp;<input name="npc2" type="text" id="npc2" size="5"  value="<?php echo $rs['ReqCreatureOrGOId2'];?>" onclick="javascript:opennpc('npc2',<?php echo intval($rs['ReqKillMobOrGOId2']);?>);"/>
   &nbsp;������<input name="n2" type="text" id="n2" size="1"  value="<?php echo $rs['ReqCreatureOrGOCount2'];?>"/>
   &nbsp;��ż��ܣ�<input name="ReqSpellCast2" type="text" id="ReqSpellCast2" size="5"  value="<?php echo $rs['ReqSpellCast2'];?>"/>
   </td>
   </tr>
  <tr>
   <td align="center">��ɱ����#3</td>
   <td colspan="2">&nbsp;<input name="npc3" type="text" id="npc3" size="5"  value="<?php echo $rs['ReqCreatureOrGOId3'];?>" onclick="javascript:opennpc('npc3',<?php echo intval($rs['ReqKillMobOrGOId3']);?>);"/>
   &nbsp;������<input name="n3" type="text" id="n3" size="1"  value="<?php echo $rs['ReqCreatureOrGOCount3'];?>"/>
   &nbsp;��ż��ܣ�<input name="ReqSpellCast3" type="text" id="ReqSpellCast3" size="5"  value="<?php echo $rs['ReqSpellCast3'];?>"/>
   </td>
   <td align="center">��ɱ����#4</td>
   <td colspan="2">&nbsp;<input name="npc4" type="text" id="npc4" size="5"  value="<?php echo $rs['ReqCreatureOrGOId4'];?>" onclick="javascript:opennpc('npc4',<?php echo intval($rs['ReqKillMobOrGOId4']);?>);"/>
   &nbsp;������<input name="n4" type="text" id="n4" size="1"  value="<?php echo $rs['ReqCreatureOrGOCount4'];?>"/>
   &nbsp;��ż��ܣ�<input name="ReqSpellCast4" type="text" id="ReqSpellCast4" size="5"  value="<?php echo $rs['ReqSpellCast4'];?>"/>
   </td>
   </tr>
  <!--<tr>
	<td colspan="6">�������(̽��/����)</td>
  </tr>
 <tr>
   <td align="center">̽������#1</td>
   <td colspan="2">&nbsp;<?php echo sy_select("zone1",$wow_zone,$rs['ExploreTrigger1']);?></td>
   <td align="center">̽������#2</td>
   <td colspan="2">&nbsp;<?php echo sy_select("zone2",$wow_zone,$rs['ExploreTrigger2']);?></td>
   </tr>
  <tr>
   <td align="center">̽������#3</td>
   <td colspan="2">&nbsp;<?php echo sy_select("zone3",$wow_zone,$rs['ExploreTrigger3']);?></td>
   <td align="center">̽������#4</td>
   <td colspan="2">&nbsp;<?php echo sy_select("zone4",$wow_zone,$rs['ExploreTrigger4']);?></td>
   </tr>
  <tr>
   <td align="center">������Ӫ</td>
   <td colspan="2">&nbsp;<?php echo sy_select("faction",$wow_faction,$rs['RequiredRepFaction']);?></td>
   <td align="center">������Ӫ��λ</td>
   <td colspan="2">&nbsp;<input name="fv" type="text" id="fv" size="10"  value="<?php echo $rs['RequiredRepValue'];?>"/></td>
   </tr>
  <tr>
	<td colspan="6">�������(��������)</td>
  </tr>
  <tr>
   <td align="center">��������#1</td>
   <td colspan="2">&nbsp;<input name="t1" type="text" id="t1" size="40"  value="<?php echo $rs['ObjectiveText1'];?>"/></td>
   <td align="center">��������#2</td>
   <td colspan="2">&nbsp;<input name="t2" type="text" id="t2" size="40"  value="<?php echo $rs['ObjectiveText2'];?>"/></td>
   </tr>
  <tr>
   <td align="center">��������#3</td>
   <td colspan="2">&nbsp;<input name="t3" type="text" id="t3" size="40"  value="<?php echo $rs['ObjectiveText3'];?>"/></td>
   <td align="center">��������#4</td>
   <td colspan="2">&nbsp;<input name="t4" type="text" id="t4" size="40"  value="<?php echo $rs['ObjectiveText4'];?>"/></td>
   </tr>-->
   <tr>
	<td colspan="6">����</td>
  </tr>
 <tr>
   <td align="center">��Ʒ����#1</td>
   <td colspan="2">&nbsp;<input name="gt1" type="text" id="gt1" size="10"  value="<?php echo $rs['RewItemId1'];?>" onclick="javascript:openitem('gt1',<?php echo intval($rs['RewItemId1']);?>);"/>
   &nbsp;������<input name="gc1" type="text" id="gc1" size="5"  value="<?php echo $rs['RewItemCount1'];?>"/></td>
   <td align="center">��Ʒ����#2</td>
   <td colspan="2">&nbsp;<input name="gt2" type="text" id="gt2" size="10"  value="<?php echo $rs['RewItemId2'];?>" onclick="javascript:openitem('gt2',<?php echo intval($rs['RewItemId2']);?>);"/>
   &nbsp;������<input name="gc2" type="text" id="gc2" size="5"  value="<?php echo $rs['RewItemCount2'];?>"/></td>
   </tr>
  <tr>
   <td align="center">��Ʒ����#3</td>
   <td colspan="2">&nbsp;<input name="gt3" type="text" id="gt3" size="10"  value="<?php echo $rs['RewItemId3'];?>" onclick="javascript:openitem('gt3',<?php echo intval($rs['RewItemId3']);?>);"/>
   &nbsp;������<input name="gc3" type="text" id="gc3" size="5"  value="<?php echo $rs['RewItemCount3'];?>"/></td>
   <td align="center">��Ʒ����#4</td>
   <td colspan="2">&nbsp;<input name="gt4" type="text" id="gt4" size="10"  value="<?php echo $rs['RewItemId4'];?>" onclick="javascript:openitem('gt4',<?php echo intval($rs['RewItemId4']);?>);"/>
   &nbsp;������<input name="gc4" type="text" id="gc4" size="5"  value="<?php echo $rs['RewItemCount4'];?>"/></td>
   </tr>
  <tr>
   <td align="center">������Ӫ����#1</td>
   <td>&nbsp;<?php echo sy_select("fa1",$wow_faction2,$rs['RewRepFaction1']);?>
   &nbsp;<input name="RewRepValueId1" type="text" id="RewRepValueId1" size="5"  value="<?php echo $rs['RewRepValueId1'];?>" title="�������ʱ���ӻ���ٵ�����ֵ.<br>����������������� >0�� <0��"/>
   &nbsp;<input name="RewRepValue1" type="text" id="RewRepValue1" size="5"  value="<?php echo $rs['RewRepValue1'];?>" title="RewRepValue1"/></td>
   <td align="center">������Ӫ����#2</td>
   <td>&nbsp;<?php echo sy_select("fa2",$wow_faction2,$rs['RewRepFaction2']);?>
   &nbsp;<input name="RewRepValueId2" type="text" id="RewRepValueId2" size="5"  value="<?php echo $rs['RewRepValueId2'];?>" title="�������ʱ���ӻ���ٵ�����ֵ.<br>����������������� >0�� <0��"/>
   &nbsp;<input name="RewRepValue2" type="text" id="RewRepValue2" size="5"  value="<?php echo $rs['RewRepValue2'];?>" title="RewRepValue2"/>
   </td>
   <td align="center">������Ӫ����#3</td>
   <td>&nbsp;<?php echo sy_select("fa3",$wow_faction2,$rs['RewRepFaction3']);?>
   &nbsp;<input name="RewRepValueId3" type="text" id="RewRepValueId3" size="5"  value="<?php echo $rs['RewRepValueId3'];?>" title="�������ʱ���ӻ���ٵ�����ֵ.<br>����������������� >0�� <0��"/>
   &nbsp;<input name="RewRepValue3" type="text" id="RewRepValue3" size="5"  value="<?php echo $rs['RewRepValue3'];?>" title="RewRepValue3"/></td>
   </tr>
  <tr>
   <td align="center">������Ӫ����#4</td>
   <td>&nbsp;<?php echo sy_select("fa4",$wow_faction2,$rs['RewRepFaction4']);?>
   &nbsp;<input name="RewRepValueId4" type="text" id="RewRepValueId4" size="5"  value="<?php echo $rs['RewRepValueId4'];?>" title="�������ʱ���ӻ���ٵ�����ֵ.<br>����������������� >0�� <0��"/>
   &nbsp;<input name="RewRepValue4" type="text" id="RewRepValue4" size="5"  value="<?php echo $rs['RewRepValue4'];?>" title="RewRepValue4"/>
   </td>
   <td align="center">������Ӫ����#5</td>
   <td  colspan="3">&nbsp;<?php echo sy_select("fa5",$wow_faction2,$rs['RewRepFaction5']);?>
   &nbsp;<input name="RewRepValueId5" type="text" id="RewRepValueId5" size="5"  value="<?php echo $rs['RewRepValueId5'];?>" title="�������ʱ���ӻ���ٵ�����ֵ.<br>����������������� >0�� <0��"/>
   &nbsp;<input name="RewRepValue5" type="text" id="RewRepValue5" size="5"  value="<?php echo $rs['RewRepValue5'];?>" title="RewRepValue5"/>
   </td>
   </tr>
  <tr>
   <td align="center">���齱��</td>
   <td>&nbsp;<input name="xp" type="text" id="xp" size="10"  value="<?php echo $rs['RewXPId'];?>"/></td>
   <td align="center">���ܽ���</td>
   <td>&nbsp;
     <input name="gskill" type="text" id="gskill" size="10"  value="<?php echo $rs['RewSpell'];?>"/></td>
   <td align="center">ʹ�ü���</td>
   <td>&nbsp;<input name="guse" type="text" id="guse" size="10"  value="<?php echo $rs['RewSpellCast'];?>"/></td>
   </tr>
  <tr>
	<td colspan="6">������Ʒѡ��(6ѡ1)</td>
  </tr>
 <tr>
   <td align="center">��Ʒ����#1</td>
   <td colspan="2">&nbsp;<input name="ct1" type="text" id="ct1" size="10"  value="<?php echo $rs['RewChoiceItemId1'];?>" onclick="javascript:openitem('ct1',<?php echo intval($rs['RewChoiceItemId1']);?>);"/>
   &nbsp;������<input name="cc1" type="text" id="cc1" size="5"  value="<?php echo $rs['RewChoiceItemCount1'];?>"/></td>
   <td align="center">��Ʒ����#2</td>
   <td colspan="2">&nbsp;<input name="ct2" type="text" id="ct2" size="10"  value="<?php echo $rs['RewChoiceItemId2'];?>" onclick="javascript:openitem('ct2',<?php echo intval($rs['RewChoiceItemId2']);?>);"/>
   &nbsp;������<input name="cc2" type="text" id="cc2" size="5"  value="<?php echo $rs['RewChoiceItemCount2'];?>"/></td>
   </tr>
  <tr>
   <td align="center">��Ʒ����#3</td>
   <td colspan="2">&nbsp;<input name="ct3" type="text" id="ct3" size="10"  value="<?php echo $rs['RewChoiceItemId3'];?>" onclick="javascript:openitem('ct3',<?php echo intval($rs['RewChoiceItemId3']);?>);"/>
   &nbsp;������<input name="cc3" type="text" id="cc3" size="5"  value="<?php echo $rs['RewChoiceItemCount3'];?>"/></td>
   <td align="center">��Ʒ����#4</td>
   <td colspan="2">&nbsp;<input name="ct4" type="text" id="ct4" size="10"  value="<?php echo $rs['RewChoiceItemId4'];?>" onclick="javascript:openitem('ct4',<?php echo intval($rs['RewChoiceItemId4']);?>);"/>
   &nbsp;������<input name="cc4" type="text" id="cc4" size="5"  value="<?php echo $rs['RewChoiceItemCount4'];?>"/></td>
   </tr>
  <tr>
   <td align="center">��Ʒ����#5</td>
   <td colspan="2">&nbsp;<input name="ct5" type="text" id="ct5" size="10"  value="<?php echo $rs['RewChoiceItemId5'];?>" onclick="javascript:openitem('ct5',<?php echo intval($rs['RewChoiceItemId5']);?>);"/>
   &nbsp;������<input name="cc5" type="text" id="cc5" size="5"  value="<?php echo $rs['RewChoiceItemCount5'];?>"/></td>
   <td align="center">��Ʒ����#6</td>
   <td colspan="2">&nbsp;<input name="ct6" type="text" id="ct6" size="10"  value="<?php echo $rs['RewChoiceItemId6'];?>" onclick="javascript:openitem('ct6',<?php echo intval($rs['RewChoiceItemId6']);?>);"/>
   &nbsp;������<input name="cc6" type="text" id="cc6" size="5"  value="<?php echo $rs['RewChoiceItemCount6'];?>"/></td>
   </tr>
  
  <tr height="35">
	<td colspan="3" align="center"><input type="submit" name="Submit2" value="�޸�/���" /></td>
	<td colspan="3" align="center"><input type="button" onclick="history.back();" name="Submit3" value="����" /></td>
  </tr>
      </form></table></td>
  </tr>
</table>
<script>
var v1,v2,v3,v3,c1,c2,c3,c4;
c1=document.getElementById("repeat");
v1=<?php echo intval($rs['IsRepeatable']);?>;
c1.checked=v1=="1";
c1=document.getElementById("nb1");
v1=parseInt(<?php echo intval($rs['ReqKillMobOrGOId1']);?>);
c1.checked=v1>0;
c2=document.getElementById("nb2");
v2=parseInt(<?php echo intval($rs['ReqKillMobOrGOId2']);?>);
c2.checked=v2>0;
c3=document.getElementById("nb3");
v3=parseInt(<?php echo intval($rs['ReqKillMobOrGOId3']);?>);
c3.checked=v3>0;
c4=document.getElementById("nb4");
v4=parseInt(<?php echo intval($rs['ReqKillMobOrGOId4']);?>);
c4.checked=v4>0;
</script>
<?php
include_once('../comm/foot.php');
?>