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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;�̵����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��ѯ����>></div>
			&nbsp;
			<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
            	<td width="65" height="25" align="center" bgcolor="#666666">�̵�ID</td>
              <td width="30%" align="left" bgcolor="#353535">&nbsp;<input name="shopid" type="text" id="shopid" size="20" /></td>
              <td width="65" height="25" align="center" bgcolor="#666666">��ƷID</td>
              <td width="30%" align="left" bgcolor="#353535">&nbsp;<input name="itemid" type="text" id="itemid" size="20" /></td>
              <td width="75" height="25" align="center" bgcolor="#666666">�޶�VIP����</td>
              <td width="10%" align="left" bgcolor="#353535">&nbsp;<input name="freevip" type="text" id="freevip" size="2" /></td>         
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="6" align="center"><input type="submit" name="Submit" value="��ѯ" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="��ʾȫ��" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
		    <div id="rightTop"><input id="showHide" type="button"> &nbsp;���ħ����ɫ��������>></div>
			<table id="tab">
            <tr bgcolor="#353535">
            	<td height="25" align="center" bgcolor="#666666">
				<a href="index.php?shopid=60000" title="����ID:60000">��������</a>
				<a href="index.php?shopid=60017" title="����ID:60017">�ճ���Ʒ</a>
				<a href="index.php?shopid=60268" title="����ID:60268">�䷽����</a>
				<a href="index.php?shopid=60063" title="����ID:60063">�������</a>
			������:(<a href="index.php?shopid=60018" title="����ID:60018">1</a>
				<a href="index.php?shopid=60016" title="����ID:60016">2</a>)
			����:(<a href="index.php?shopid=60019" title="����ID:60019">1</a>
				<a href="index.php?shopid=60020" title="����ID:60020">2</a>
				<a href="index.php?shopid=60021" title="����ID:60021">3</a>
				<a href="index.php?shopid=60022" title="����ID:60022">4</a>)
			������:(<a href="index.php?shopid=60027" title="����ID:60027">սʿ</a>
				<a href="index.php?shopid=60028" title="����ID:60028">ʥ��</a>
				<a href="index.php?shopid=60029" title="����ID:60029">����</a>
				<a href="index.php?shopid=60030" title="����ID:60030">����</a>
				<a href="index.php?shopid=60031" title="����ID:60031">��ʦ</a>
				<a href="index.php?shopid=60032" title="����ID:60032">����</a>
				<a href="index.php?shopid=60033" title="����ID:60033">����</a>
				<a href="index.php?shopid=60034" title="����ID:60034">��ʦ</a>
				<a href="index.php?shopid=60035" title="����ID:60035">��ʿ</a>
				<a href="index.php?shopid=60036" title="����ID:60036">��³��</a>)
			�鱦:(<a href="index.php?shopid=60054" title="����ID:60054">��</a>
				<a href="index.php?shopid=60055" title="����ID:60055">��</a>
				<a href="index.php?shopid=60056" title="����ID:60056">��</a>
				<a href="index.php?shopid=60057" title="����ID:60057">��</a>
				<a href="index.php?shopid=60058" title="����ID:60058">��</a>
				<a href="index.php?shopid=60059" title="����ID:60059">��</a>
				<a href="index.php?shopid=60060" title="����ID:60060">�任</a>
				<a href="index.php?shopid=60061" title="����ID:60061">��</a>
				<a href="index.php?shopid=60062" title="����ID:60062">����</a>)<br>
			������:(<a href="index.php?shopid=60037" title="����ID:60037">Ԫ��</a>
				<a href="index.php?shopid=200021" title="����ID:200021">����</a>
				<a href="index.php?shopid=200005" title="����ID:200005">��ħ</a>
				<a href="index.php?shopid=200006" title="����ID:200006">����</a>
				<a href="index.php?shopid=60038" title="����ID:60038">����</a>
				<a href="index.php?shopid=60039" title="����ID:60039">Ƥ��</a>
				<a href="index.php?shopid=60040" title="����ID:60040">�����Ϳ�ʯ</a>
				<a href="index.php?shopid=60041" title="����ID:60041">����</a>
				<a href="index.php?shopid=60042" title="����ID:60042">��ҩ</a>
				<a href="index.php?shopid=60043" title="����ID:60043">��ħ</a>
				<a href="index.php?shopid=60044" title="����ID:60044">�鱦���</a>
				<a href="index.php?shopid=60045" title="����ID:60045">���</a>
				<a href="index.php?shopid=60046" title="����ID:60046">װ��</a>
				<a href="index.php?shopid=60047" title="����ID:60047">������</a>
				<a href="index.php?shopid=60048" title="����ID:60048">ԭ��</a>
				<a href="index.php?shopid=60049" title="����ID:60049">����</a>
				<a href="index.php?shopid=60050" title="����ID:60050">���׸�ħ</a>
				<a href="index.php?shopid=60051" title="����ID:60051">������ħ</a>
				<a href="index.php?shopid=60052" title="����ID:60052">Կ��</a>
				<a href="index.php?shopid=60053" title="����ID:60053">��ҩ</a>)
				<a href="index.php?shopid=200001" title="����ID:200001">ʩ������</a><br>
			200+װ����:(<a href="index.php?shopid=200000" title="����ID:200000">�ӻ�</a>
				<a href="index.php?shopid=200002" title="����ID:200002">����</a>
				<a href="index.php?shopid=200004" title="����ID:200004">������</a>
				<a href="index.php?shopid=200007" title="����ID:200007">ͷ��</a>
				<a href="index.php?shopid=200008" title="����ID:200008">���</a>
				<a href="index.php?shopid=200009" title="����ID:200009">����</a>
				<a href="index.php?shopid=200010" title="����ID:200010">����</a>
				<a href="index.php?shopid=200011" title="����ID:200011">����</a>
				<a href="index.php?shopid=200012" title="����ID:200012">սѥ</a>
				<a href="index.php?shopid=200013" title="����ID:200013">����</a>
				<a href="index.php?shopid=200014" title="����ID:200014">����</a>
				<a href="index.php?shopid=200015" title="����ID:200015">����</a>
				<a href="index.php?shopid=200016" title="����ID:200016">��ָ</a>
				<a href="index.php?shopid=200017" title="����ID:200017">��Ʒ</a>
				<a href="index.php?shopid=200018" title="����ID:200018">����</a>
				<a href="index.php?shopid=200019" title="����ID:200019">����</a>
				<a href="index.php?shopid=200020" title="����ID:200020">���֡�ʥ��</a>
				<a href="index.php?shopid=200022" title="����ID:200022">���޽Ƕ�ʿ</a>
				<a href="index.php?shopid=200023" title="����ID:200023">�����Ƕ�ʿ</a>
				<a href="index.php?shopid=200024" title="����ID:200024">S5����</a>
				<a href="index.php?shopid=200025" title="����ID:200025">S5��Ʒ�����ơ�����</a>
				
				
)
				
				
				

            	
            	
            	</td>
            </tr>
          
          </form>
	  </table>
		  &nbsp;
<div id="rightTop"><input id="showHide" type="button"> �̵��ѯ���>></div>
            <table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>�̵�ID</th>
                <th>��ƷID</th>
                <th>��Ʒ����</th>
                <th>��Ҽ۸�</th>
                <th>��չ����<a href="../img/help/ItemExtendedCost.dbc.txt"><img src="../img/help/excel_icon.gif" alt="�鿴��չ�����������" align="middle" /></a></th>
				<th>���ּ۸�</th>
				<th>�޶�VIP����</th>
				<th>ɾ��</th>
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
						case 0:$stat = "��ͨ���";break;
						case 3:$stat = "ϵͳ������";break;
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
					//$stat = intval($rs['banned'])==0?"����":"����";
					echo '<td>'.$rs['ExtendedCost'].'</td>';
					echo '<td>'.$rs['jf'].'</td>';
					echo '<td>'.$rs['vip'].'</td>';
					echo '<td><a href="edit.php?act=del&entry='.$rs['entry'].'&item='.$rs['item'].'">ɾ��</a></td>';
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