<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_item_up_list_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`_item_up_list` ';
	$sql .= " WHERE (`key_item`='" .intval(trim($_REQUEST['key_item'])). "') ";
	$query = mysql_query($sql);
	header("location:item_up_list.php");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;��Ʒ�ϳɹ���</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��Ʒ�ϳɲ�ѯ���>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>������Ʒ</th>
                <th>Ŀ����Ʒ</th>
        <th>����1</th>
        <th>����1</th>
        <th>����2</th>
        <th>����2</th>
        <th>����3</th>
        <th>����3</th>
        <th>����4</th>
        <th>����4</th>
        <th>����5</th>
        <th>����5</th>
        <th>��Ҫ���</th>
        <th>��Ҫ����</th>
        <th>�ɹ���</th>
        <th>ɾ��</th>
              </tr>
				<?php
				$sql = item_up_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="key_item[]" type="hidden" id="key_item[]" value="'.$rs['key_item'].'" size="1"/>
			<input name="newkey_item[]" type="text" id="newkey_item[]" value="'.$rs['key_item'].'" size="5" title="�����ϳɲ˵��Ĵ�����Ʒ {�úϳɱ�ʯ���������Ʒ�����ϳɲ˵�}, ������Ʒ���ϳ�ǰ����Ʒ, Ŀ����ƷΪ�ϳɺ����Ʒ"/></td>';
		echo '<td><input name="dst_item[]" type="text" id="dst_item[]" value="'.$rs['dst_item'].'" size="5" title="Ŀ����Ʒ {�ϳɳɹ���������Ʒ, ������Ʒ�ᱻɾ��}, ������Ʒ���ϳ�ǰ����Ʒ, Ŀ����ƷΪ�ϳɺ����Ʒ"></td>';
		echo '<td><input name="item1[]" type="text" id="item1[]" value="'.$rs['item1'].'" size="5" title="��Ҫ������Ʒ1"/></td>';
		echo '<td><input name="count1[]" type="text" id="count1[]" value="'.$rs['count1'].'" size="1" title="��Ҫ������Ʒ1������"/></td>';
		echo '<td><input name="item2[]" type="text" id="item2[]" value="'.$rs['item2'].'" size="5" title="��Ҫ������Ʒ2"/></td>';
		echo '<td><input name="count2[]" type="text" id="count2[]" value="'.$rs['count2'].'" size="1" title="��Ҫ������Ʒ2������"/></td>';
		echo '<td><input name="item3[]" type="text" id="item3[]" value="'.$rs['item3'].'" size="5" title="��Ҫ������Ʒ3"/></td>';
		echo '<td><input name="count3[]" type="text" id="count3[]" value="'.$rs['count3'].'" size="1" title="��Ҫ������Ʒ3������"/></td>';
		echo '<td><input name="item4[]" type="text" id="item4[]" value="'.$rs['item4'].'" size="5"  title="��Ҫ������Ʒ4"/></td>';
		echo '<td><input name="count4[]" type="text" id="count4[]" value="'.$rs['count4'].'" size="1" title="��Ҫ������Ʒ4������"/></td>';
		echo '<td><input name="item5[]" type="text" id="item5[]" value="'.$rs['item5'].'" size="5" title="��Ҫ������Ʒ5"/></td>';
		echo '<td><input name="count5[]" type="text" id="count5[]" value="'.$rs['count5'].'" size="1" title="��Ҫ������Ʒ5������"/></td>';
		echo '<td><input name="money[]" type="text" id="money[]" value="'.$rs['money'].'" size="6" title="�ϳ���Ʒʱ��ĵĽ����"/></td>';
		echo '<td><input name="mb[]" type="text" id="mb[]" value="'.$rs['mb'].'" size="6" title="�ϳ���Ʒʱ��ĵĻ�����"/></td>';
		echo '<td><input name="prob[]" type="text" id="prob[]" value="'.$rs['prob'].'" size="3" title="�ϳ���Ʒ�ĳɹ���, ע��:�����ӵ��<font color=red>���˱�ʯ</font>ʱ,ÿ�����˱�ʯ������1%�ĺϳɳɹ���. ӵ��<font color=red>������ʯ</font>������Ʒ�ϳ�ʧ�ܺ�֤������Ʒ�����ݻ�!"/></td>';

		echo '<td><a href="?act=del&key_item='.$rs['key_item'].'"  onclick="return confirm(\'�Ƿ�ȷ��ɾ�� key_item:'.$rs['key_item'].'\');">ɾ��</a></td>';
		echo '</tr>';
	}
				if($num>0) echo '<tr><td align="center" colspan="16" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
	<tr height="35">
	<td colspan="16" align="center"><input type="submit" name="Submit2" value="�޸�" /></td>
	</tr>
            </table>


     </form>

	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>