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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;��ʯ��NPC�˵�����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ˵��>></div>
<table id="tab">
            <tr bgcolor="#353535">
              <td><br>"show_menu "=>"��ʾ��˵�<font color=#FF9797>��ʽ:show_menu ��</font>"<br>
"querytrade "=>"��ѯ�������<font color=#FF9797>��ʽ:querytrade</font>"<br>
"top todayKills "=>"���ջ�ɱ���а�<font color=#FF9797>��ʽ:top todayKills</font>"<br>
"top totalKills "=>"�ܻ�ɱ���а�<font color=#FF9797>��ʽ:top totalKills</font>"<br>
"top todayHonorPoints "=>"�����������а�<font color=#FF9797>��ʽ:top todayHonorPoints</font>"<br>
"top totalHonorPoints "=>"���������а�<font color=#FF9797>��ʽ:top totalHonorPoints</font>"<br>
"top money "=>"������а�<font color=#FF9797>��ʽ:top money</font>"<br>
"go "=>"���͵�����<font color=#FF9797>��ʽ:go ��ͼID x���� y���� z���� o����</font>"<br>
"recievetrade "=>"��ȡ����<font color=#FF9797>��ʽ:recievetrade</font>"<br>
"chongzhi "=>"ʹ�ó�ֵ����ֵ<font color=#FF9797>��ʽ:chongzhi</font>"<br>
"gold "=>"��һ��ֻ��һ�<font color=#FF9797>��ʽ:gold</font>"<br>
"xp "=>"��������<font color=#FF9797>��ʽ:xp ����������ֵ ��ߵȼ�</font>"<br>
"level "=>"�����ȼ�<font color=#FF9797>��ʽ:level ÿ���������� ��߼���</font>"<br>
"talent "=>"�����츳��<font color=#FF9797>��ʽ:talent �����츳����</font>"<br>
"buyvipplayer "=>"�����ԱȨ�޻�Ա�ȼ������Ϣ�����_vipinfo��<font color=#FF9797>��ʽ:buyvipplayer VipLevel</font>"<br>
"skilllevel "=>"��������������<font color=#FF9797>��ʽ:skilllevel</font>"<br>
"show_bank "=>"������<font color=#FF9797>��ʽ:show_bank</font>"<br>
"reset_talent "=>"�����츳<font color=#FF9797>��ʽ:reset_talent</font>"<br>
"bind_pos "=>"¯ʯ��<font color=#FF9797>��ʽ:bind_pos</font>"<br>
"activate_taxi "=>"������е�<font color=#FF9797>��ʽ:activate_taxi</font>"<br>
"fix "=>"����װ��<font color=#FF9797>��ʽ:fix</font>"<br>
"AutoPay "=>"��ȡ�ݵ㹤��<font color=#FF9797>��ʽ:AutoPay</font>"<br>
"rename "=>"��ɫ��������<font color=#FF9797>��ʽ:rename</font>"<br>
"instanceUnbind "=>"���ø���<font color=#FF9797>��ʽ:instanceUnbind</font>"<br>
"ranks "=>"�����������ϵͳ<font color=#FF9797>��ʽ:ranks</font>"<br>
"lushi "=>"ʹ��¯ʯ,���͵�¯ʯ�󶨵ص�<font color=#FF9797>��ʽ:lushi</font>"<br>
"ysxlsee "=>"�鿴Ԫ������״̬<font color=#FF9797>��ʽ:ysxlsee</font>"<br>
"ysxl liliang "=>"����Ԫ������<font color=#FF9797>��ʽ:ysxl liliang</font>"<br>
"ysxl mingjie "=>"����Ԫ������<font color=#FF9797>��ʽ:ysxl mingjie</font>"<br>
"ysxl naili "=>"����Ԫ������<font color=#FF9797>��ʽ:ysxl naili</font>"<br>
"ysxl zhili "=>"����Ԫ������<font color=#FF9797>��ʽ:ysxl zhili</font>"<br>
"ysxl jingshen "=>"����Ԫ������<font color=#FF9797>��ʽ:ysxl jingshen</font>"<br>
"ranks up "=>"���������ؼ�ָ��(id=561���ɸ���)<font color=#FF9797>��ʽ:ranks up</font>"<br>
"show_auction "=>"��������<font color=#FF9797>��ʽ:show_auction</font>"<br>
"castspell "=>"ʩ�ż���,�����ڱ���,�ٳ���,������е�<font color=#FF9797>��ʽ:castspell spellID</font>"<br>
"pvp_switch "=>"����PVP����<font color=#FF9797>��ʽ:pvp_switch</font>"<br>
"returnm "=>"�ָ�����,�������״̬<font color=#FF9797>��ʽ:returnm</font>"<br>
"change "=>"����,���ù���ģ��+ģ�ʹ�Сʵ����ұ�����<font color=#FF9797>��ʽ:change ģ��ID ģ�ʹ�С</font>"<br>
"DJ "=>"������<font color=#FF9797>��ʽ:DJ ����ID</font>"<br>
"unknow "=>"���Ա�<font color=#FF9797>��ʽ:unknow</font>"<br>
"change_sex "=>"���Ա�<font color=#FF9797>��ʽ:change_sex</font>"<br>
"back "=>"�⿨,�س����� <font color=#FF9797>��ʽ:back</font>"<br>
"cjjk "=>"�����⿨,�⿨ս�� <font color=#FF9797>��ʽ:cjjk</font>"<br>
"cmd "=>"��������,����ʹ���������е�GM����GM���������command���в��� <font color=#FF9797>��ʽ:cmd [�Լ�ʹ��:0 �ɶ�Ŀ��ʹ��:1] GM����</font>"<br><br>&nbsp;</td>
            </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��ʯ��NPC�˵���ѯ���>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>id</th>
                <th>ͼ��</th>
        <th>����</th>
        <th>����</th>
        <th>��</th>
        <th>����</th>
        <th>���ͽ��</th>
        <th>���ͻ���</th>
        <th>ɾ����Ʒ</th>
        <th>�޶�VIP</th>
        <th>ɾ��</th>
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
		echo '<td><a href="?act=del&id='.$rs['id'].'"  onclick="return confirm(\'�Ƿ�ȷ��ɾ�� id:'.$rs['id'].' '.$rs['itemtext'].'\');">ɾ��</a></td>';
		echo '</tr>';
	}
				if($num>0) echo '<tr><td align="center" colspan="12" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
	<tr height="35">
	<td colspan="13" align="center"><input type="submit" name="Submit2" value="�޸�" /></td>
	</tr>
            </table>


     </form>

	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>