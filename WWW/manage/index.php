<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
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
	<div id="rightTop"><input id="showHide" type="button"> ����Ա�б�>></div>
<table id="tab">
			  <tr align="center">
                <td height="25" colspan="9" bgcolor="#353535"><a href="add.php">��Ӳ���Ա</a></td>
              </tr>
              <tr height="25" align="center">
                <th>���</th>
                <th>�ʺ�</th>
                <th>����</th>
                <th>����½</th>
                <th>IP��ַ</th>
				<th>�༭</th>
              </tr>
				<?php
				$sql = sy_manage_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['aid'].'</td>';
					echo '<td><a href="edit.php?id='.$rs['aid'].'">'.$rs['aname'].'</a></td>';
					echo '<td>'.$rs['amail'].'</td>';
					echo '<td>'.date('Y-m-d h:i:s',$rs['alasttime']+8*60*60).'</td>';
					echo '<td>'.$rs['alastip'].'</td>';
					echo '<td><a href="edit.php?id='.$rs['aid'].'">�༭</a></td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="6" height="35" bgcolor="#353535">'.sy_page('',$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>