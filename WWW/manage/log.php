<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;����Ա����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��ѯ����>></div>
<table id="tab">
		<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="300" height="25" align="center">����Ա</td>
              <td align="left" bgcolor="#353535">&nbsp;<input name="uname" type="text" id="uname" size="20" />
			  <input name="only" type="checkbox" id="only" value="1">
			  ��ȷ��ѯ</td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="��ѯ" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="��ʾȫ��" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ������¼��ѯ���>></div>
<table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>����Ա</th>
                <th>����ʱ��</th>
				<th>������Ϊ</th>
              </tr>
				<?php
				$sql = sy_manage_log($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['aname'].'</td>';
					echo '<td>'.date("Y-m-d H:i:s",$rs['ltime']+8*60*60).'</td>';
					echo '<td align="left">&nbsp;&nbsp;'.$rs['laction'].'</td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="3" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>