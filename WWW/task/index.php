<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/zone.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'DELETE FROM `'.$db_world.'`.`quest_template` ';
	$sql .= " WHERE (`entry`='" .intval(trim($_REQUEST['id'])). "') ";
	$query = mysql_query($sql);
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;�������</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��ѯ����>></div>
<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">������</td>
              <td width="40%" align="left" bgcolor="#353535">&nbsp;<input name="task_entry" type="text" id="task_entry" size="20" /></td>
              <td width="65" align="center" bgcolor="#666666">��������</td>
              <td width="40%" align="left">&nbsp;<input name="task_name" type="text" id="task_name" size="20" /></td>
            </tr>
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">��������</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("task_class",$wow_task);?></td>
              <td width="65" align="center" bgcolor="#666666">����ȼ�</td>
              <td width="40%" align="left">&nbsp;<input name="QuestLevel" type="text" id="QuestLevel" size="20" /></td>
            </tr>
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">��������</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("task_zone",$wow_zone);?></td>
              <td width="65" align="center" bgcolor="#666666">&nbsp;</td>
              <td width="40%" align="left">&nbsp;</td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="��ѯ" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="��ʾȫ��" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> �����ѯ���>></div>
<table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>������</th>
                <th>��������</th>
                <th>����ȼ�</th>
                <th>��������</th>
                <th>ְҵ</th>
                <th>����</th>
                <th>������</th>
        <th>ɾ��</th>
              </tr>
				<?php
				$sql = sy_task_list($pn,$num,$page,$pages);
				$query = mysql_query($sql);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['entry'].'</td>';
					echo '<td><a href="edit.php?id='.$rs['entry'].'">'.$rs['Title'].'</a></td>';
					echo '<td>'.$rs['QuestLevel'].'</td>';
					echo '<td>'.$wow_zone[$rs['ZoneOrSort']].'</td>';
					if($rs['RequiredClass']>0)
					{
						$str = array();
						$arr = sy_exist($wow_work,$rs['RequiredClass']);
						for($i=0;$i<sizeof($arr);$i++)
						{
							$str[] = $wow_work[$arr[$i]];
						}
						echo '<td>'.join('��',$str).'</td>';
					}
					else
					{
						echo '<td>����ְҵ</td>';
					}
					if($rs['RequiredRaces']>0)
					{
						$str = array();
						$arr = sy_exist($wow_nation,$rs['RequiredRaces']);
						for($i=0;$i<sizeof($arr);$i++)
						{
							$str[] = $wow_nation[$arr[$i]];
						}
						echo '<td>'.join('��',$str).'</td>';
					}
					else
					{
						echo '<td>��������</td>';
					}
	$jl='';
	for($i=1;$i<=6;$i++)
	{
	if($rs['RewChoiceItemId'.$i])
		$jl.="ѡ������Ʒ".$i."��".$rs['RewChoiceItemId'.$i]."*".$rs['RewChoiceItemCount'.$i]."<br>";
	}
	for($i=1;$i<=4;$i++)
	{
	if($rs['RewItemId'.$i])
		$jl.="������Ʒ".$i."��".$rs['RewItemId'.$i]."*".$rs['RewItemCount'.$i]."<br>";
	}
	for($i=1;$i<=4;$i++)
	{
	if($rs['RewRepFaction'.$i])
		$jl.="��������".$i."��".$rs['RewRepFaction'.$i]." [".$rs['RewRepValueId'.$i]."] [".$rs['RewRepValue'.$i]."]<br>";
	}
					
					echo '<td>'.$jl.'</td>';
					echo '<td><a href="?act=del&id='.$rs['entry'].'">ɾ��</a></td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="8" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>