<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_special_edit();
}
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`_special` ';
	$sql .= " WHERE (`id`='" .intval(trim($_REQUEST['id'])). "') ";
	$query = mysql_query($sql);
	header("location:special.php");
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;�˵��󶨹���</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ˵��>></div>
<table id="tab">
            <tr bgcolor="#353535">
              <td><br>ָ��<font color=red> ��ʯ��NPC�˵��� </font>�и��˵������󶨵���Ʒ��NPC, ��ͨ����ҳ��ָ����Ʒ��NPC�������ʾ�˵����еĲ˵�<br><br>&nbsp;</td>
            </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> �˵��󶨲�ѯ���>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>id</th>
                <th>����ID</th>
        <th>����</th>
        <th>����</th>
        <th>ɾ��</th>
              </tr>
				<?php
				$sql = special($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr align="center">';
		echo '<td><input name="id[]" type="hidden" id="id[]" value="'.$rs['id'].'" size="3"/>
			<input name="newid[]" type="text" id="newid[]" value="'.$rs['id'].'" size="3"/></td>';
		echo '<td><input name="Speciaid[]" type="text" id="Speciaid[]" value="'.$rs['Speciaid'].'" size="6" title="(����ƷID��npcID)"/></td>';
		echo '<td><input name="type[]" type="text" id="type[]" value="'.$rs['type'].'" size="1" title="(ָ���������ƷID����npcID)<br>1:��Ʒ<br>0:NPC"/></td>';
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
		echo '<td><a href="?act=del&id='.$rs['id'].'"  onclick="return confirm(\'�Ƿ�ȷ��ɾ�� id:'.$rs['id'].'\');">ɾ��</a></td>';
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