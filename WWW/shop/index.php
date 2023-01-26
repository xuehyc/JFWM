<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="158" align="center" valign="top" bgcolor="#353535">
	<?php
	include_once('../inc/left.php');
	?>
	</td>
    <td valign="top" bgcolor="#353535">
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;商店管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 查询条件>></div>
			&nbsp;
			<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
            	<td width="65" height="25" align="center" bgcolor="#666666">商店ID</td>
              <td width="30%" align="left" bgcolor="#353535">&nbsp;<input name="shopid" type="text" id="shopid" size="20" /></td>
              <td width="65" height="25" align="center" bgcolor="#666666">物品ID</td>
              <td width="30%" align="left" bgcolor="#353535">&nbsp;<input name="itemid" type="text" id="itemid" size="20" /></td>
              <td width="75" height="25" align="center" bgcolor="#666666">限定VIP购买</td>
              <td width="10%" align="left" bgcolor="#353535">&nbsp;<input name="freevip" type="text" id="freevip" size="2" /></td>         
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="6" align="center"><input type="submit" name="Submit" value="查询" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="显示全部" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
		    <div id="rightTop"><input id="showHide" type="button"> &nbsp;尖峰魔兽特色商人链接>></div>
			<table id="tab">
            <tr bgcolor="#353535">
            	<td height="25" align="center" bgcolor="#666666">
				<a href="index.php?shopid=60000" title="商人ID:60000">积分商人</a>
				<a href="index.php?shopid=60017" title="商人ID:60017">日常货品</a>
				<a href="index.php?shopid=60268" title="商人ID:60268">配方商人</a>
				<a href="index.php?shopid=60063" title="商人ID:60063">表扬徽章</a>
			宠物商:(<a href="index.php?shopid=60018" title="商人ID:60018">1</a>
				<a href="index.php?shopid=60016" title="商人ID:60016">2</a>)
			坐骑:(<a href="index.php?shopid=60019" title="商人ID:60019">1</a>
				<a href="index.php?shopid=60020" title="商人ID:60020">2</a>
				<a href="index.php?shopid=60021" title="商人ID:60021">3</a>
				<a href="index.php?shopid=60022" title="商人ID:60022">4</a>)
			雕文商:(<a href="index.php?shopid=60027" title="商人ID:60027">战士</a>
				<a href="index.php?shopid=60028" title="商人ID:60028">圣骑</a>
				<a href="index.php?shopid=60029" title="商人ID:60029">猎人</a>
				<a href="index.php?shopid=60030" title="商人ID:60030">盗贼</a>
				<a href="index.php?shopid=60031" title="商人ID:60031">牧师</a>
				<a href="index.php?shopid=60032" title="商人ID:60032">死骑</a>
				<a href="index.php?shopid=60033" title="商人ID:60033">萨满</a>
				<a href="index.php?shopid=60034" title="商人ID:60034">法师</a>
				<a href="index.php?shopid=60035" title="商人ID:60035">术士</a>
				<a href="index.php?shopid=60036" title="商人ID:60036">德鲁伊</a>)
			珠宝:(<a href="index.php?shopid=60054" title="商人ID:60054">红</a>
				<a href="index.php?shopid=60055" title="商人ID:60055">蓝</a>
				<a href="index.php?shopid=60056" title="商人ID:60056">黄</a>
				<a href="index.php?shopid=60057" title="商人ID:60057">紫</a>
				<a href="index.php?shopid=60058" title="商人ID:60058">绿</a>
				<a href="index.php?shopid=60059" title="商人ID:60059">橙</a>
				<a href="index.php?shopid=60060" title="商人ID:60060">变换</a>
				<a href="index.php?shopid=60061" title="商人ID:60061">简单</a>
				<a href="index.php?shopid=60062" title="商人ID:60062">菱形</a>)<br>
			材料商:(<a href="index.php?shopid=60037" title="商人ID:60037">元素</a>
				<a href="index.php?shopid=200021" title="商人ID:200021">炼金</a>
				<a href="index.php?shopid=200005" title="商人ID:200005">附魔</a>
				<a href="index.php?shopid=200006" title="商人ID:200006">铭文</a>
				<a href="index.php?shopid=60038" title="商人ID:60038">布料</a>
				<a href="index.php?shopid=60039" title="商人ID:60039">皮革</a>
				<a href="index.php?shopid=60040" title="商人ID:60040">金属和矿石</a>
				<a href="index.php?shopid=60041" title="商人ID:60041">肉类</a>
				<a href="index.php?shopid=60042" title="商人ID:60042">草药</a>
				<a href="index.php?shopid=60043" title="商人ID:60043">附魔</a>
				<a href="index.php?shopid=60044" title="商人ID:60044">珠宝设计</a>
				<a href="index.php?shopid=60045" title="商人ID:60045">零件</a>
				<a href="index.php?shopid=60046" title="商人ID:60046">装置</a>
				<a href="index.php?shopid=60047" title="商人ID:60047">爆裂物</a>
				<a href="index.php?shopid=60048" title="商人ID:60048">原料</a>
				<a href="index.php?shopid=60049" title="商人ID:60049">其它</a>
				<a href="index.php?shopid=60050" title="商人ID:60050">护甲附魔</a>
				<a href="index.php?shopid=60051" title="商人ID:60051">武器附魔</a>
				<a href="index.php?shopid=60052" title="商人ID:60052">钥匙</a>
				<a href="index.php?shopid=60053" title="商人ID:60053">弹药</a>)
				<a href="index.php?shopid=200001" title="商人ID:200001">施法材料</a><br>
			200+装备商:(<a href="index.php?shopid=200000" title="商人ID:200000">杂货</a>
				<a href="index.php?shopid=200002" title="商人ID:200002">坐骑</a>
				<a href="index.php?shopid=200004" title="商人ID:200004">新武器</a>
				<a href="index.php?shopid=200007" title="商人ID:200007">头盔</a>
				<a href="index.php?shopid=200008" title="商人ID:200008">肩膀</a>
				<a href="index.php?shopid=200009" title="商人ID:200009">胸铠</a>
				<a href="index.php?shopid=200010" title="商人ID:200010">腰带</a>
				<a href="index.php?shopid=200011" title="商人ID:200011">护腿</a>
				<a href="index.php?shopid=200012" title="商人ID:200012">战靴</a>
				<a href="index.php?shopid=200013" title="商人ID:200013">护腕</a>
				<a href="index.php?shopid=200014" title="商人ID:200014">手套</a>
				<a href="index.php?shopid=200015" title="商人ID:200015">项链</a>
				<a href="index.php?shopid=200016" title="商人ID:200016">戒指</a>
				<a href="index.php?shopid=200017" title="商人ID:200017">饰品</a>
				<a href="index.php?shopid=200018" title="商人ID:200018">盾牌</a>
				<a href="index.php?shopid=200019" title="商人ID:200019">披风</a>
				<a href="index.php?shopid=200020" title="商人ID:200020">副手·圣物</a>
				<a href="index.php?shopid=200022" title="商人ID:200022">憎恨角斗士</a>
				<a href="index.php?shopid=200023" title="商人ID:200023">致命角斗士</a>
				<a href="index.php?shopid=200024" title="商人ID:200024">S5武器</a>
				<a href="index.php?shopid=200025" title="商人ID:200025">S5饰品·盾牌·披风</a>
				
				
)
				
				
				

            	
            	
            	</td>
            </tr>
          
          </form>
	  </table>
		  &nbsp;
<div id="rightTop"><input id="showHide" type="button"> 商店查询结果>></div>
            <table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>商店ID</th>
                <th>物品ID</th>
                <th>物品名称</th>
                <th>金币价格</th>
                <th>扩展货币<a href="../img/help/ItemExtendedCost.dbc.txt"><img src="../img/help/excel_icon.gif" alt="查看扩展货币相关数据" align="middle" /></a></th>
				<th>积分价格</th>
				<th>限定VIP购买</th>
				<th>删除</th>
              </tr>
				<?php
				$sql = 'SELECT b.*,c.name,c.buyprice ';
				$sql .= 'FROM `'.$db_world.'`.`npc_vendor` as b ';
				$sql .= 'LEFT JOIN `'.$db_world.'`.`item_template` as c ';
				$sql .= 'ON (b.item=c.entry) ';
				$sql .= 'WHERE 1=1 ';
				if(trim($_GET['shopid'])!='') $sql .= "and b.entry = '".trim($_GET['shopid'])."' ";
				if(trim($_GET['itemid'])!='') $sql .= 'and b.item='.trim($_GET['itemid']).' ';
				if(trim($_GET['freevip'])!='') $sql .= 'and b.vip='.trim($_GET['freevip']).' ';
				//$pn = "?shopid=1";
				if(trim($_GET['shopid'])!='') $pn .= '?entry='.trim($_GET['shopid']);
				//if(trim($_GET['stat'])!='') $pn .= '&stat='.intval($_GET['stat']);
				$query=mysql_query($sql,$conn);
				$num=mysql_num_rows($query);
				echo mysql_error();
				$page=intval($_GET['page']);
				$page=$page<=0?1:$page;
				$pages=intval($num/$listnum);
				$pages=$num%$listnum==0?$pages:$pages+1;
				$start=($page-1)*$listnum;
				
				if(trim($_GET['shopid'])!='')	$sql .= "ORDER BY b.item ASC ";
				else $sql .= "ORDER BY b.entry DESC ";
				
				$sql .= 'LIMIT '.$start.','.$listnum;
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td><a href="index.php?shopid='.$rs['entry'].'">'.$rs['entry'].'</a></td>';
					/*switch(intval($rs['gm']))
					{
						case 0:$stat = "普通玩家";break;
						case 3:$stat = "系统开发者";break;
						default:$stat = "";break;
					}*/
					$buyprice = $rs['buyprice'];
					$price="";
					if($buyprice>=10000)
						$price = substr($buyprice,  0, -4).'<img src="../img/gold.gif" alt="" align="middle" />';
					if($buyprice>=100 && substr($buyprice, -4,  -2)!=0)
						$price.= substr($buyprice, -4,  -2).'<img src="../img/silver.gif" alt="" align="middle" />';
					if(substr($buyprice, -2)!=0)
						$price.=substr($buyprice, -2).'<img src="../img/copper.gif" alt="" align="middle" />';
					if($buyprice==0)
						$price="0";
					echo '<td><a href="edit.php?itemid='.$rs['item'].'&shopid='.$rs['entry'].'">'.$rs['item'].'</a></td>';
					echo '<td>'.$rs['name'].'</td>';
					echo '<td>'.$price.'</td>';
					//$stat = intval($rs['banned'])==0?"正常":"禁用";
					echo '<td>'.$rs['ExtendedCost'].'</td>';
					echo '<td>'.$rs['jf'].'</td>';
					echo '<td>'.$rs['vip'].'</td>';
					echo '<td><a href="edit.php?act=del&entry='.$rs['entry'].'&item='.$rs['item'].'">删除</a></td>';
					echo '</tr>';
				}
				?>
            </table>
	</td>
  </tr>
</table>
<?php
if($num>0) echo '<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0"><tr><td align="center" colspan="7" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr></table>';
include_once('../comm/foot.php');
?>