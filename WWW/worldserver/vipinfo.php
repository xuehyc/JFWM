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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;��Ա�ȼ�����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��Ա�ȼ���ѯ���>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>VIP�ȼ�</th>
                <th>���鱶��</th>
        <th>���ʱ���</th>
        <th>����VIP�������</th>
        <th>�������</th>
        <th>�����ȼ�</th>
        <th>�����ݵ���</th>
        <th>������Ʒ</th>
        <th>����ͷ��</th>
        <th>�����ɫ</th>
        <th>�����츳</th>
        <th>ɾ��</th>
              </tr>
				<?php
				$sql = vipinfo($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="viplevel[]" type="hidden" id="viplevel[]" value="'.$rs['viplevel'].'" size="3"/>
			<input name="newviplevel[]" type="text" id="newviplevel[]" value="'.$rs['viplevel'].'" size="3" title="VIP�ȼ�, �������޸�����"/></td>';
		echo '<td><input name="xp_rate[]" type="text" id="xp_rate[]" value="'.round($rs['xp_rate'], 2).'" size="4" title="VIP����������ͨ�������ߵľ��鱶��"></td>';
		echo '<td><input name="loot_rate[]" type="text" id="loot_rate[]" value="'.round($rs['loot_rate'], 2).'" size="4" title="VIP����������ͨ�������ߵı��ʱ���"/></td>';
		echo '<td><input name="buy_jf[]" type="text" id="buy_jf[]" value="'.$rs['buy_jf'].'" size="10" title="VIP����ֻ��Ҫ�����"/></td>';
		echo '<td><input name="buy_money[]" type="text" id="buy_money[]" value="'.$rs['buy_money'].'" size="6" title="����VIP������������Ҹ����"/></td>';
		echo '<td><input name="init_level[]" type="text" id="init_level[]" value="'.$rs['init_level'].'" size="1" title="����VIP�����������ȼ����趨ֵ"/></td>';
		echo '<td><input name="init_money[]" type="text" id="init_money[]" value="'.$rs['init_money'].'" size="6" /></td>';
		echo '<td><input name="init_item[]" type="text" id="init_item[]" value="'.$rs['init_item'].'" size="6" title="����VIP������������Ʒ�����, ��������Ʒֻ������һ�� , ��������Խ�������, �����ڿɷŸ��ཱ��װ��"/></td>';
		echo '<td><input name="honor_name[]" type="text" id="honor_name[]" value="'.$rs['honor_name'].'" size="15" title="�����Աͷ��, ����ڲ�ѯ��������ʱ����Կ����Լ���VIPͷ��"/></td>';
		echo '<td><input name="chat_color[]" type="text" id="chat_color[]" value="'.$rs['chat_color'].'" size="10" title="�����Ա������ɫ, �����������ʱ����Կ�����ͬ�ȼ���VIP���ӵ�в�ͬ��������ɫ"/></td>';
		echo '<td><input name="ex_talent[]" type="text" id="ex_talent[]" value="'.$rs['ex_talent'].'" size="1" title="����VIP�������츳��"/></td>';
		echo '<td><a href="?act=del&viplevel='.$rs['viplevel'].'"  onclick="return confirm(\'�Ƿ�ȷ��ɾ�� id:'.$rs['viplevel'].'\');">ɾ��</a></td>';
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