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
    	<br><div id="rightTop"><input id="showHide" type="button"> λ�ã���̨����&gt;��ɫ����</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> ��ѯ����>></div>
			<table id="tab">
			<form action='?' method="get">
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">�û���</td>
              <td width="40%" align="left" bgcolor="#353535">&nbsp;<input name="uname" type="text" id="uname" size="20" /></td>
              <td width="65" align="center" bgcolor="#666666">��ɫ����</td>
              <td width="40%" align="left">&nbsp;<input name="cname" type="text" id="cname" size="20" /></td>
            </tr>
            <tr bgcolor="#353535">
              <td width="65" height="25" align="center" bgcolor="#666666">����״̬</td>
              <td width="40%" align="left">&nbsp;<?php echo sy_select("online",array("����","����"));?></td>
              <td width="65" align="center" bgcolor="#666666">��ɫ�ȼ�</td>
              <td width="40%" align="left">&nbsp;<input name="level" type="text" id="level" size="20" /></td>
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
                <th>��Ϸ�ʺ�</th>
                <th>��ɫ����</th>
	<th>HP(��)</th>
	<th>����</th>
	<th>ְҵ</th>
	<th>����</th>
	<th>��ɱ</th>
	<th>��ͼ-����</th>
                <th>�ȼ�</th>
                <th>VIP</th>
                <th>����</th>
                <th>�ʺ�״̬</th>
                <th>�޸�</th>
              </tr>
				<?php
				$sql = sy_role_list($pn,$num,$page,$pages);
				$query = mysql_query($sql,$conn);
				while($rs = mysql_fetch_array($query))
				{
					$n++;
					echo '<tr align="center" height="25" bgcolor="#353535">';
					echo '<td><a href="../account/edit.php?id='.$rs['id'].'">'.$rs['username'].'</td>';
					//echo '<td><a href="edit.php?id='.$rs['guid'].'">'.$rs['name'].'</a></td>';
		//��ѯ���
		$type="";
		if($rs['at_login']==1)
			$type = '<a href="#" title="���������">?</a>';
		if($rs['at_login']==2)
			$type = '<a href="#" title="���ü��ܱ��">?</a>';
		if($rs['at_login']==4)
			$type = '<a href="#" title="�����츳���">?</a>';
		if($rs['at_login']==16)
			$type = '<a href="#" title="���ó����츳���">?</a>';

					echo '<td>'.$rs['name'].'&nbsp;'.$type.'</td>';
					
					$zwqclass=$rs['class'];
					if($zwqclass==1){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn1++;}
					if($zwqclass==2){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn2++;}
					if($zwqclass==3){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn3++;}
					if($zwqclass==4){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn4++;}
					if($zwqclass==5){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn5++;}
					if($zwqclass==6){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn6++;}
					if($zwqclass==7){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn7++;}
					if($zwqclass==8){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn8++;}
					if($zwqclass==9){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn9++;}
					if($zwqclass==11){$zwqclass='<img src="../img/c_icons/'.$rs['class'].'.gif"';$nn10++;}
					
					$zwqrace=$rs['race'];
					if($zwqrace==1){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nlm++;}
					if($zwqrace==2){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nbl++;}
					if($zwqrace==3){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nlm++;}
					if($zwqrace==4){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nlm++;}
					if($zwqrace==5){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nbl++;}
					if($zwqrace==6){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nbl++;}
					if($zwqrace==7){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nlm++;}
					if($zwqrace==8){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nbl++;}
					if($zwqrace==9){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nlm++;}
					if($zwqrace==10){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nbl++;}
					if($zwqrace==11){$zwqrace='<img src="../img/c_icons/'.$rs['race'].'-'.$rs['gender'].'.gif"';$nlm++;}
					
	echo '<td>'.ceil($rs['health']/10000).'</td>';//HP
	echo '<td>'.$zwqclass.'</td>';
	echo '<td>'.$zwqrace.'</td>';
echo '<td><img src="../img/ranks/rank'.char_get_pvp_rank_id($rs['totalHonorPoints'], char_get_side_id($rs['race'])).'.gif" title="��������:'.$rs['totalHonorPoints'].'"></td>';//��������
	echo '<td>'.$rs['totalKills'].'</td>';//��ɱ��
include_once('../comm/zone.php');
	echo '<td>'.$wow_map[$rs['map']].'-'.$wow_zone[$rs['zone']].'</td>';//��ͼ-����
		
					echo '<td>'.$rs['level'].'</td>';
					echo '<td>'.$rs['vip'].' <span style="vertical-align:middle;"><a href="../account/edit.php?id='.$rs['id'].'"><img src="..\img\edit.gif" /></a></span></td>';
					echo '<td>'.$rs['jf'].' <span style="vertical-align:middle;"><a href="../account/edit.php?id='.$rs['id'].'"><img src="..\img\edit.gif" /></a></span></td>';
					$query_ban = mysql_query("SELECT * FROM ".$db_auth.".account_banned WHERE id = '".$rs['id']."' and active<> '0' ",$conn);
					$stat = mysql_fetch_array($query_ban)?"<font color=red>����</font>":"����";
					echo '<td>'.$stat.'</td>';
					echo '<td><a href="?guid='.$rs['guid'].'&type=1">������</a> <a href="?guid='.$rs['guid'].'&type=2">���ü���</a> <a href="?guid='.$rs['guid'].'&type=4">�����츳</a> <a href="?guid='.$rs['guid'].'&type=16">���ó����츳</a></td>';
					echo '</tr>';
				}
				if($num>0) echo '<tr><td align="center" colspan="13" bgcolor="#353535"><br>
				��'.$n.'��, ����:'.$nbl.'��, ����:'.$nlm.'��!<br><br>
				</td></tr>';
if($_GET["type"])
{
	$sql = 'UPDATE `'.$db_char.'`.`characters` SET ' ;
	if($_GET["type"]==1)
		$sql .= "`at_login` = '1' ";
	if($_GET["type"]==2)
		$sql .= "`at_login` = '2' ";
	if($_GET["type"]==4)
		$sql .= "`at_login` = '4' ";
	if($_GET["type"]==16)
		$sql .= "`at_login` = '16' ";

	$sql .= "WHERE `guid` = '".$_GET["guid"]."' ";
	$query = mysql_query($sql,$conn);
echo "<script language=\"JavaScript\">alert(\"�����ɹ�,�´ε�½�ý�ɫʱ����ʾ��������!\");</script>"; 

}


//get pvp rank ID by honor point  ��ȡ����������ΪͼƬ��־������ʾ��ͼ�� // minimanager\libs\char_lib.php�����ݿ�ʼ
function char_get_pvp_rank_id($honor_points=0, $side_id=0)
{
    $rank_id = '0'.$side_id;
    if($honor_points > 0)
    {
        if($honor_points < 2000)
            $rank_id = 1;
        else
            $rank_id = ceil($honor_points / 5000) + 1;
    }
    if ($rank_id > 14)
        $rank_id = 14;
    return $rank_id;
}
function char_char_get_race_names_n_sides_tab()
{
    global $lang_id_tab;
    return array
    (
        1 => array($lang_id_tab['human'],    0),
        2 => array($lang_id_tab['orc'],      1),
        3 => array($lang_id_tab['dwarf'],    0),
        4 => array($lang_id_tab['nightelf'], 0),
        5 => array($lang_id_tab['undead'],   1),
        6 => array($lang_id_tab['tauren'],   1),
        7 => array($lang_id_tab['gnome'],    0),
        8 => array($lang_id_tab['troll'],    1),
        10 => array($lang_id_tab['bloodelf'], 1),
        11 => array($lang_id_tab['draenei'],  0),
    );
}
function char_get_side_id($race_id)
{
    $race_sides = char_char_get_race_names_n_sides_tab();

    return $race_sides[$race_id][1];
}
// minimanager\libs\char_lib.php�����ݽ���
				?>
            </table>
	</td>
  </tr>
</table>
<?php
if($num>0) echo '<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0"><tr><td align="center" colspan="7" height="35" bgcolor="#353535">'.sy_page($pn,$page,$pages,$num).'</td></tr></table>';
include_once('../comm/foot.php');
?>