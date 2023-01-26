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
	$sql = 'DELETE FROM `'.$db_world.'`.`item_template` ';
	$sql .= " WHERE (`entry`='" .intval(trim($_REQUEST['item_entry'])). "') ";
	$query = mysql_query($sql);
}
?>
<script>
function showitem(event,dscpid)
{
	if (!event)
		{
			var event = window.event;
		}
	var dscpobj = document.getElementById("mmx"+dscpid);
	if (!dscpobj)
		{
			return;
		}
	var xfix = 0;
	var yfix = 0;
	var yall = 768;
	if (document.documentElement.scrollTop || document.documentElement.scrollLeft)
		{
			xfix = document.documentElement.scrollLeft;
			yfix = document.documentElement.scrollTop;
			yall = document.documentElement.clientHeight;
		}
	else if (document.body.scrollTop || document.body.scrollLeft)
		{
			xfix = document.body.scrollLeft;
			yfix = document.body.scrollTop;
			yall = document.body.clientHeight;
		}
	if ((yall-event.clientY)<250)
		{
			dscpobj.style.top = event.clientY + yfix - 75 +'px';
		}
	else
		{
			dscpobj.style.top = event.clientY + yfix + 16 +'px';
		}
	dscpobj.style.left = event.clientX + xfix + 16 +'px';
	dscpobj.style.display = 'block';
}

function moveitem(event,dscpid)
{
if (!event)
		{
			var event = window.event;
		}
	var dscpobj;
	dscpobj = document.getElementById("mmx"+dscpid);
	var xfix = 0;
	var yfix = 0;
	var yall = 768;
	if (document.documentElement.scrollTop || document.documentElement.scrollLeft)
		{
			xfix = document.documentElement.scrollLeft;
			yfix = document.documentElement.scrollTop;
			yall = document.documentElement.clientHeight;
		}
	else if (document.body.scrollTop || document.body.scrollLeft)
		{
			xfix = document.body.scrollLeft;
			yfix = document.body.scrollTop;
			yall = document.body.clientHeight;
		}
	if ((yall-event.clientY)<250)
		{
			dscpobj.style.top = event.clientY + yfix - 75 +'px';
		}
	else
		{
			dscpobj.style.top = event.clientY + yfix + 16 +'px';
		}
	dscpobj.style.left = event.clientX + xfix + 16 +'px';
}

function hideitem(event,dscpid)
{
if (!event)
		{
			var event = window.event;
		}
	var dscpobj;
	dscpobj = document.getElementById("mmx"+dscpid);
	if (!dscpobj)
		{
			return;
		}
	dscpobj.style.display = 'none';
	dscpobj.style.top = 0 +'px';
	dscpobj.style.left = 0 +'px';
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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;物品管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 查询条件>></div>
<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">物品编号</td>
              <td width="40%" align="left" bgcolor="#353535">&nbsp;<input name="item_entry" type="text" id="item_entry" size="20" /></td>
              <td width="65" align="center" bgcolor="#666666">物品名称</td>
              <td width="40%" align="left">&nbsp;<input name="item_name" type="text" id="item_name" size="20" /></td>
            </tr>
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">物品类型</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("item_class",$wow_class);?></td>
              <td width="65" align="center" bgcolor="#666666">物品等级</td>
              <td width="40%" align="left">&nbsp;<input name="item_level" type="text" id="item_level" size="20" /></td>
            </tr>
			<tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">绑定</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("item_bonding",$wow_bonding);?></td>
              <td width="65" align="center" bgcolor="#666666">物品质量</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("item_quality",$wow_quality,'',$wow_color);?></td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="查询" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="显示全部" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 物品查询结果>></div>
<table id="tab">
              <tr height="25" align="center" class="tb_title">
			  <th>编号</th>
                <th>物品名称</th>
                <th>类型</th>
                <th>子类型</th>
                <th>绑定</th>
                <th>需求等级</th>
                <th>物品等级</th>
                <th>购买价</th>
                <th>卖回价</th>
                <th>存储类型</th>
                <th>标志</th>
                <th>删除</th>
              </tr>
				<?php
				$sql = sy_item_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td><a href="edit.php?id='.$rs['entry'].'">'.$rs['entry'].'</a></td>';
					$jpg = file_exists('../icons/'.$rs['displayicon'].'.jpg')?$rs['displayicon']:404;
					echo '<td align="left" valign="middle">';
					echo '<img style="cursor:pointer"  width=40 height=40 align="absmiddle" src="../icons/'.$jpg.'.jpg" onmouseover="showitem(event,'.$rs['entry'].')" onmousemove="moveitem(event,'.$rs['entry'].')" onmouseout="hideitem(event,'.$rs['entry'].')">';
					echo '&nbsp;<font color="'.$wow_color[$rs['quality']].'">'.$rs['name'].'</font>&nbsp;';
					echo '</td>';
					echo '<div class="sytip" id="mmx'.$rs['entry'].'" style="width:300px;display:none;">';
					echo '<div style="padding:5px;line-height:150%">';
					echo '<font color="'.$wow_color[$rs['quality']].'">'.$rs['name1'].'</font><br>';
					if($rs['bonding']>=1&&$rs['bonding']<=4)
					echo ''.$wow_bonding[$rs['bonding']].'<br>';
					if(intval($rs['Unique'])==1)
					echo '唯一<br>';
					if(intval($rs['inventorytype'])>0)
					echo '<span class="s51">'.$wow_pos[$rs['inventorytype']].'</span><span class="s52">'.$wow_subclass[$rs['class']][$rs['subclass']].'</span><br class=s53>';
					$dps = 0;
					for($i=1;$i<=5;$i++)
					{
					if(intval($rs['dmg_min'.$i])>0&&intval($rs['dmg_max'.$i])>0)
					{
					$dps +=($rs['dmg_min'.$i]+$rs['dmg_max'.$i])/2;
					echo ''.$rs['dmg_min'.$i].' - '.$rs['dmg_max'.$i].$wow_damage[$rs['dmg_type'.$i]].'<br>';
					}
					}
					if($dps>0&&$rs['delay']>0)
					echo '<span class=s51>每秒伤害 '.number_format($dps/($rs['delay']/1000),2).'</span><span class=s52>速度 '.($rs['delay']/1000).'</span><br class=s53>';
					if($rs['armor']>0)
					echo ''.$rs['armor'].'点护甲<br>';
					if($rs['block']>0)
					echo ''.$rs['block'].'格档<br>';
					for($i=1;$i<=10;$i++)
					{
					if(intval($rs['stat_type'.$i])>0&&intval($rs['stat_value'.$i])>0)
					{
					echo '+'.$rs['stat_value'.$i].$wow_state[$rs['stat_type'.$i]].'<br>';
					}
					}
					if($rs['arcane_res']>0)
					echo '+'.$rs['arcane_res'].'奥术抗性<br>';
					if($rs['holy_res']>0)
					echo '+'.$rs['holy_res'].'神圣抗性<br>';
					if($rs['fire_res']>0)
					echo '+'.$rs['fire_res'].'火焰抗性<br>';
					if($rs['nature_res']>0)
					echo '+'.$rs['nature_res'].'自然抗性<br>';
					if($rs['frost_res']>0)
					echo '+'.$rs['frost_res'].'冰霜抗性<br>';
					if($rs['shadow_res']>0)
					echo '+'.$rs['shadow_res'].'暗影抗性<br>';
					$str = array();
					if($rs['allowableclass']>0)
					{
						$arr = sy_exist($wow_work,$rs['allowableclass']);
						for($i=0;$i<sizeof($arr);$i++)
						{
							if(trim($wow_work[$arr[$i]])!="")
							{
							$str[] = $wow_work[$arr[$i]];
							}
						}
						echo '职业：'.join(',',$str).'<br>';
					}
					if(intval($rs['itemlevel'])>0)
					echo '等级：'.$rs['itemlevel'].'<br>';
					for($i=1;$i<=5;$i++)
					{
					if(intval($rs['spellid_'.$i])>0&&intval($rs['spelltrigger_'.$i])>0)
					{
					echo '<span style="color:green;font-weight:bold;">'.$wow_use[$rs['spelltrigger_'.$i]].'：'.sy_getskill($rs['spellid_'.$i]).'</span><br>';
					}
					}
                                        if($rs['description']!="")
					echo '<font color="#ffe600">"'.$rs['description'].'"</font><br>';
					echo '</div>';
					echo '</div>';
					echo '<td>'.$wow_class[$rs['class']].'</td>';
					echo '<td>'.$wow_subclass[$rs['class']][$rs['subclass']].'</td>';
					echo '<td>'.$wow_bonding[$rs['bonding']].'</td>';
					echo '<td>'.$rs['ItemLevel'].'</td>';
					echo '<td>'.$rs['RequiredLevel'].'</td>';
			$buyprice = $rs['BuyPrice'];
			$price="";
			if($buyprice>=10000)
				$price = substr($buyprice,  0, -4).'<img src="../img/gold.gif" alt="" align="middle" />';
			if($buyprice>=100 && substr($buyprice, -4,  -2)!=0)
				$price.= substr($buyprice, -4,  -2).'<img src="../img/silver.gif" alt="" align="middle" />';
			if(substr($buyprice, -2)!=0)
				$price.=substr($buyprice, -2).'<img src="../img/copper.gif" alt="" align="middle" />';
			if($buyprice==0)
				$price="0";
			$sellprice = $rs['SellPrice'];
			$sprice="";
			if($sellprice>=10000)
				$sprice = substr($sellprice,  0, -4).'<img src="../img/gold.gif" alt="" align="middle" />';
			if($sellprice>=100 && substr($sellprice, -4,  -2)!=0)
				$sprice.= substr($sellprice, -4,  -2).'<img src="../img/silver.gif" alt="" align="middle" />';
			if(substr($sellprice, -2)!=0)
				$sprice.=substr($sellprice, -2).'<img src="../img/copper.gif" alt="" align="middle" />';
			if($sellprice==0)
				$sprice="0";
					echo '<td>'.$price.'</td>';
					echo '<td>'.$sprice.'</td>';
					echo '<td>'.$ItemInventoryType[$rs['InventoryType']].'</td>';
					$str = array();
					if($rs['Flags']>0)
					{
						$arr = sy_exist($item_flags2,$rs['Flags']);
						for($i=0;$i<sizeof($arr);$i++)
						{
							$str[] = $item_flags2[$arr[$i]];
						}
					}
					echo '<td>'.join('<br>',$str).'</td>';
					echo '<td><a href="?act=del&item_entry='.$rs['entry'].'"  onclick="return confirm(\'是否确定删除 '.$rs['name'].'\');">删除</a></td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="12" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>