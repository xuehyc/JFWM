<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="save")
{
	sy_conf_edit();
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;��Ϸ���ù���</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ˵��>></div>
<table id="tab">
            <tr bgcolor="#353535">
              <td align="center"><br>���ħ����ɫ�������ڴ�ҳ������޸�, ��Ϸһ������������"ħ�޷�������"Ŀ¼���� <a href="http://www.duote.com/soft/372.html" target="_blank">Emeditor</a> ���ߴ�worldserver.conf�ļ������޸�!<br>&nbsp;</td>
            </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��Ϸ���ñ�1��ѯ���>></div>
<table id="tab">
		<form action="?act=save" method="post" onSubmit="return checkform(this);">
              <tr height="25" align="center" class="tb_title">
			  <th>����</th>
                <th>ֵ</th>
                <th>˵��</th>
              </tr>
				<?php
				$sql = _jfwow_game_config($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr height="25" bgcolor="#353535">';
					echo '<td align="center" style="color:#FF9797;"><input name="id[]" type="hidden" id="id[]" value="'.$rs['confName'].'" size="6"/>'.$rs['confName'].'</td>';
					echo '<td ><input name="value[]" type="text" id="value[]" value="'.$rs['value'].'" size="6"/></td>';
					echo '<td>'.$rs['memo'].'</td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="12" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
	<tr height="35">
	<td colspan="13" align="center"><input type="submit" name="Submit2" value="�޸�" /></td>
	</tr>
            </table>

		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��Ϸ���ñ�2��ѯ��� (�޸����²��������С����)>></div>
<table id="tab">
              <tr height="25" align="center" class="tb_title">
			  <th>����</th>
                <th>ֵ</th>
                <th>˵��</th>
              </tr>
				<?php
				$sql = _jfwow_game_rate_config($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr height="25" bgcolor="#353535">';
					echo '<td align="center" style="color:#DCB5FF;"><input name="rate_name[]" type="hidden" id="rate_name[]" value="'.$rs['rate_name'].'" size="6"/>'.$rs['rate_name'].'</td>';
					echo '<td ><input name="rate[]" type="text" id="rate[]" value="'.$rs['rate'].'" size="6"/></td>';
					echo '<td>'.$rs['memo'].'</td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="12" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
	<tr height="35">
	<td colspan="13" align="center"><input type="submit" name="Submit2" value="�޸�" /></td>
	</tr>
     </form>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>