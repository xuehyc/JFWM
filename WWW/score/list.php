<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
include_once('../comm/head.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="del")
{
	$sql = 'truncate table `'.$db_auth.'`.`_jf_log` ';
	$query = mysql_query($sql);
	echo mysql_error();
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;���ֹ���</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��ѯ����</div>
<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="300" height="25" align="center">�û���</td>
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
	<div id="rightTop"><input id="showHide" type="button"> ���Ѽ�¼��ѯ���>></div>
<table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>�û���</th>
                <th>���ֱ䶯</th>
				<th>ʱ��</th>
				<th>��Ϊ</th>
              </tr>
				<?php
				$sql = sy_score_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['username'].'</td>';
					
					$jf=$rs['value'];
					if($jf<0)
						$jf="<font color=red>".$jf."</font>";
					if($jf>0)
						$jf="<font color=#00FF00>+".$jf."</font>";
					echo '<td>'.$jf.'</td>';
					echo '<td>'.$rs['date'].'</td>';
					echo '<td align="left">&nbsp;&nbsp;'.$rs['action'].'</td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="4" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).' </td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>