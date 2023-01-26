<?php
include_once('../config.php');
include_once('const.php');
include_once('../inc/func.php');
include_once('../comm/head.php');
?>
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="158"  valign="top" bgcolor="#353535">
	<?php
	include_once('../inc/left.php');
	?>
	</td>
    <td valign="top" bgcolor="#353535">
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;GM命令列表</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 查询条件>></div>
<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">GM命令</td>
              <td  align="left" bgcolor="#353535">&nbsp;<input name="name" type="text" id="name" size="20" /></td>
              <td width="65" height="25" align="center" bgcolor="#666666">GM等级</td>
              <td  align="left" bgcolor="#353535">&nbsp;<input name="security" type="text" id="security" size="20" /></td>
              <td width="65" align="center" bgcolor="#666666">说明</td>
              <td  align="left">&nbsp;<input name="help" type="text" id="help" size="20" /></td>
            </tr>
            <tr bgcolor="#353535">
              <td height="35" colspan="6" align="center"><input type="submit" name="Submit" value="查询" />&nbsp;<input onclick="location='?';" type="button" name="showall" value="显示全部" /></td>
              </tr>
          </form>
	  </table>
	<div id="rightTop"><input id="showHide" type="button"> GM命令查询结果>></div>
<table id="tab">
            <tr height="25" class="tb_title">
			<th>GM命令</th>
            <th>GM等级</th>
        	<th>说明</th>
              </tr>
				<?php
				$sql = gmcommand($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
	while($rs = mysql_fetch_array($query))
	{
		$n++;
		echo '<tr>';
		echo '<td width="165">'.$rs['name'].'</td>';
		echo '<td align="center" width="50">'.$rs['security'].'</td>';
		echo '<td>'.$rs['help'].'</td>';
		echo '</tr>';
	}
				if($num>0) echo '<tr><td align="center" colspan="16" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr>';
				?>

            </table>


     </form>

	</td>
  </tr>
</table>
<?php
include_once('../comm/foot.php');
?>