<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;�ʺŹ���</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��ѯ����>></div>
			<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">�û���</td>
              <td width="40%" align="left" bgcolor="#353535">&nbsp;<input name="uname" type="text" id="uname" size="20" /></td>
              <td width="65" height="25" align="center" bgcolor="#666666">���</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("stat",array("����","����"));?></td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="��ѯ" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="��ʾȫ��" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
<div id="rightTop"><input id="showHide" type="button"> �ʺŲ�ѯ���>></div>
            <table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>ID</th>
                <th>�û���</th>
                <th>GM�ȼ�</th>
                <th>��Ա����</th>
                <th>����</th>
                <th>�ʺ�״̬</th>
                <th>ע������</th>
				<th>����½ʱ��</th>
				<th>����½IP</th>
              </tr>
				<?php
				$sql = 'SELECT b.*,c.gmlevel ';
				$sql .= 'FROM `'.$db_auth.'`.`account` as b ';
				$sql .= 'LEFT JOIN `'.$db_auth.'`.`account_access` as c ';
				$sql .= 'ON (b.id=c.id) ';
				$sql .= 'WHERE 1=1 ';
				if(trim($_GET['uname'])!='') $sql .= "and b.username like '%".trim($_GET['uname'])."%' ";
				if(trim($_GET['stat'])!='') $sql .= 'and b.banned='.intval($_GET['stat']).' ';
				$pn = "?tmp=1";
				if(trim($_GET['uname'])!='') $pn .= '&uname='.trim($_GET['uname']);
				if(trim($_GET['stat'])!='') $pn .= '&stat='.intval($_GET['stat']);
				$query=mysql_query($sql,$conn);
				$num=mysql_num_rows($query);
				$page=intval($_GET['page']);
				$page=$page<=0?1:$page;
				$pages=intval($num/$listnum);
				$pages=$num%$listnum==0?$pages:$pages+1;
				$start=($page-1)*$listnum;
				$sql .= "ORDER BY b.id DESC ";
				$sql .= 'LIMIT '.$start.','.$listnum;
				$query = mysql_query($sql,$conn);
				
				
				
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td>'.$rs['id'].'</td>';
					echo '<td><a href="edit.php?id='.$rs['id'].'">'.$rs['username'].'</a></td>';
					switch(intval($rs['gmlevel']))
					{
						case 0:$stat = "0";break;
						case 1:$stat = "<font color=#FFC8C8>1</font>";break;
						case 2:$stat = "<font color=#FF8080>2</font>";break;
						case 3:$stat = "<font color=red>3</font>";break;
						default:$stat = "<font color=red>>3</font>";break;
					}
					//echo '<td>'.intval($rs['gmlevel']).'</td>';
					echo '<td>'.$stat.'</td>';
					echo '<td>'.$rs['vip'].'</td>';
					
					$query_jfadd = mysql_query("SELECT value FROM ".$db_auth."._jf_add WHERE accid = '".$rs['id']."' and flag= '0' ",$conn);
					while($rs_jfadd = mysql_fetch_array($query_jfadd))
					{
						$jfadd = $jfadd + $rs_jfadd['value'];
					}
					if($jfadd)
						$jfadd = '<a href="#" title="�� _jf_add ��δ��ȡ����"> + '.$jfadd.'</a>';
					echo '<td>'.$rs['jf'].$jfadd.'</td>';
					
					$query_ban = mysql_query("SELECT * FROM ".$db_auth.".account_banned WHERE id = '".$rs['id']."' and active<> '0' ",$conn);
					$stat = mysql_fetch_array($query_ban)?"<font color=red>����</font>":"����";
					
					echo '<td>'.$stat.'</td>';
					echo '<td>'.date('Y-m-d',strtotime($rs['joindate'])).'</td>';
					echo '<td>'.$rs['last_login'].'</td>';
					echo '<td>'.$rs['last_ip'].'</td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="9" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>
            </table>
	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>