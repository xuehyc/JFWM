<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_ranksystem_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`_ranksystem` ';
	$sql .= " WHERE (`rank`='" .intval(trim($_REQUEST['rank'])). "') ";
	$query = mysql_query($sql);
	header("location:ranksystem.php");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;����ϵͳ����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ����ϵͳ��ѯ���>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>���εȼ�</th>
                <th>��������</th>
        <th>������Ʒ</th>
        <th>��Ҫ������</th>
        <th>��Ҫ������</th>
        <th>��������ֵ</th>
        <th>����ħ��ֵ</th>
        <th>�����츳</th>
        <th>��������</th>
        <th>��������</th>
        <th>��������</th>
        <th>��������</th>
        <th>��������</th>
        <th>ɾ��</th>
              </tr>
				<?php
				$sql = ranksystem($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="rank[]" type="hidden" id="rank[]" value="'.$rs['rank'].'" size="1"/>
			<input name="newrank[]" type="text" id="newrank[]" value="'.$rs['rank'].'" size="1" title="���εȼ�, �������޸�����"/></td>';
		echo '<td><input name="name[]" type="text" id="name[]" value="'.$rs['name'].'" size="10" title="��������, ��ѯ�������ʱ���Կ���"></td>';
		echo '<td><input name="itemid[]" type="text" id="itemid[]" value="'.$rs['itemid'].'" size="5" title="��Ҫ��Ʒ, �д���Ʒ�ſ�����������"/></td>';
		echo '<td><input name="reqhon[]" type="text" id="reqhon[]" value="'.$rs['reqhon'].'" size="10" title="��Ҫ�ﵽ���õ����������ſ�����������,����۳���������"/></td>';
		echo '<td><input name="reqjjc[]" type="text" id="reqjjc[]" value="'.$rs['reqjjc'].'" size="3" title="��Ҫ��������"/></td>';
		echo '<td><input name="addhp[]" type="text" id="addhp[]" value="'.$rs['addhp'].'" size="6" title="�����������ֵ"/></td>';
		echo '<td><input name="addmp[]" type="text" id="addmp[]" value="'.$rs['addmp'].'" size="6" title="�������ħ��ֵ"/></td>';
		echo '<td><input name="addtf[]" type="text" id="addtf[]" value="'.$rs['addtf'].'" size="1" title="��������츳��"/></td>';
		echo '<td><input name="addliliang[]" type="text" id="addliliang[]" value="'.$rs['addliliang'].'" size="6"  title="�����������"/></td>';
		echo '<td><input name="addjingshen[]" type="text" id="addjingshen[]" value="'.$rs['addjingshen'].'" size="6" title="������Ҿ���"/></td>';
		echo '<td><input name="addnaili[]" type="text" id="addnaili[]" value="'.$rs['addnaili'].'" size="6" title="�����������"/></td>';
		echo '<td><input name="addminjie[]" type="text" id="addminjie[]" value="'.$rs['addminjie'].'" size="6" title="�����������"/></td>';
		echo '<td><input name="addzhili[]" type="text" id="addzhili[]" value="'.$rs['addzhili'].'" size="6" title="�����������"/></td>';

		echo '<td><a href="?act=del&rank='.$rs['rank'].'"  onclick="return confirm(\'�Ƿ�ȷ��ɾ�� id:'.$rs['rank'].'\');">ɾ��</a></td>';
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