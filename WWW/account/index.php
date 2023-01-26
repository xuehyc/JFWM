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
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;帐号管理</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 查询条件>></div>
			<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">用户名</td>
              <td width="40%" align="left" bgcolor="#353535">&nbsp;<input name="uname" type="text" id="uname" size="20" /></td>
              <td width="65" height="25" align="center" bgcolor="#666666">封号</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("stat",array("正常","禁用"));?></td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="4" align="center"><input type="submit" name="Submit" value="查询" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="显示全部" /></td>
              </tr>
          </form>
	  </table>
		  &nbsp;
<div id="rightTop"><input id="showHide" type="button"> 帐号查询结果>></div>
            <table id="tab">
              <tr height="25" align="center" class="tb_title">
                <th>ID</th>
                <th>用户名</th>
                <th>GM等级</th>
                <th>会员级别</th>
                <th>积分</th>
                <th>帐号状态</th>
                <th>注册日期</th>
				<th>最后登陆时间</th>
				<th>最后登陆IP</th>
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
						$jfadd = '<a href="#" title="表 _jf_add 中未领取积分"> + '.$jfadd.'</a>';
					echo '<td>'.$rs['jf'].$jfadd.'</td>';
					
					$query_ban = mysql_query("SELECT * FROM ".$db_auth.".account_banned WHERE id = '".$rs['id']."' and active<> '0' ",$conn);
					$stat = mysql_fetch_array($query_ban)?"<font color=red>被封</font>":"正常";
					
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