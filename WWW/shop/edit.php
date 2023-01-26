<?php
include_once('../config.php');
include_once('../inc/const.php');
include_once('../inc/faction.php');
include_once('../inc/func.php');
include_once('../inc/check.php');
?>
<?php
if(trim(strtolower($_REQUEST['act']))=="edit")
{
sy_shop_edit();
}

//if(trim(strtolower($_REQUEST['act']))=="add")
//{
//sy_shop_edit();
//}
//if(trim(strtolower($_REQUEST['act']))=="del") 列表页可以删除
//{
//sy_shop_itemdel();
//}
?>
<?php
include_once('../comm/head.php');
?>
<script>
function checkform(frm)
{
	with(frm)
	{
		if(shopid.value=="")
		{
			alert("请输入目标商店ID!");
			//pass.focus();
			return false;
		}
		if(jf.value=="")
		{
			alert("请输入新积分价格!");
			//pass.focus();
			return false;
		}
		if(buyprice.value=="")
		{
			alert("请输入新金币价格!");
			//pass.focus();
			return false;
		}
		if(vip.value=="")
		{
			alert("请输入限定VIP购买等级!");
			//pass.focus();
			return false;
		}
		
	}
} 

</script>

<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="158" align="center" valign="top" bgcolor="#353535">
	<?php
	include_once('../inc/left.php');
	?>
	</td>
    <td valign="top" bgcolor="#353535">
    	<br><div id="rightTop"><input id="showHide" type="button"> 位置：后台管理&gt;商店</div>
			&nbsp;
	<div id="rightTop"><input id="showHide" type="button"> 商店修改</div>

<?php
$sql = 'SELECT name ';
$sql .= 'FROM `'.$db_world.'`.`creature_template`  ';
$sql .= 'WHERE entry='.intval($_GET['shopid']).' ';
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
$shopname=$rs['name'];
				$sql = 'SELECT b.*,c.name,c.buyprice ';
				$sql .= 'FROM `'.$db_world.'`.`npc_vendor` as b ';
				$sql .= 'LEFT JOIN `'.$db_world.'`.`item_template` as c ';
				//$sql .= 'LEFT JOIN `'.$db_world.'`.`creature_template`.`name` as d.name2 ';
				$sql .= 'ON (b.item=c.entry) ';
				$sql .= 'WHERE 1=1 ';
$sql .= 'and b.item='.intval($_GET['itemid']).' ';
$sql .= 'and b.entry='.intval($_GET['shopid']).' ';
$query = mysql_query($sql,$conn);
$rs = mysql_fetch_array($query);
?>

&nbsp;
<table id="tab">
<form  action="?act=edit" method="post" onSubmit="return checkform(this);">
   <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">商店:</td>
   <td align="left" bgcolor="#353535">&nbsp;&nbsp;<input name="entry" type="hidden" id="entry" value="<?php echo $rs['entry'];?>" size="10" readonly="true" />
    <input name="newentry" type="text" id="newentry" value="<?php echo $rs['entry'];?>" size="10" /><?php echo $shopname;?></td>


   <td width="110" align="center" bgcolor="#353535">物品:</td>
   <td bgcolor="#353535">&nbsp;&nbsp;<input name="item" type="hidden" id="item" value="<?php echo $rs['item'];?>" size="10" readonly="true" />
   	   
   	   <input name="newitem" type="text" id="newitem" value="<?php echo $rs['item'];?>" size="10" /><?php echo $rs['name'];?></td>


  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">积分价格:</td>
   <td align="left" bgcolor="#353535">&nbsp;&nbsp;<input name="jf" type="text" id="jf" value="<?php echo $rs['jf'];?>" size="10"/></td>
   <td width="110" align="center" bgcolor="#353535">限定VIP购买:</td>
   <td align="left" bgcolor="#353535">&nbsp;&nbsp;<input name="vip" type="text" id="vip" value="<?php echo $rs['vip'];?>" size="10" /></td>
  </tr>
  <tr height="25" bgcolor="#353535">
   <td width="110" align="center" bgcolor="#353535">金币价格:</td>
   <td align="left" bgcolor="#353535">&nbsp;&nbsp;<input name="buyprice" type="text" id="buyprice" value="<?php echo $rs['buyprice'];?>" size="10" /></td>
   <td width="110" align="center" bgcolor="#353535">扩展货币:</td>
   <td align="left" bgcolor="#353535">&nbsp;&nbsp;<input name="ExtendedCost" type="text" id="ExtendedCost" value="<?php echo $rs['ExtendedCost'];?>" size="10" /><a href="../img/help/ItemExtendedCost.dbc.txt"><img src="../img/help/excel_icon.gif" alt="查看扩展货币相关数据"  /></a></td>
</tr>
	<tr height="35" bgcolor="#353535">
      <td colspan="6" align="center">
      	  
      	  <input  type="submit" name="Submit2" value="修改" />
                	
				<input type="button" onClick="history.back();" name="Submit3" value="返回" />
					&nbsp;&nbsp;<a href="../shop/add.php">添加销售</a>

					</td>
              </tr>
      </form></table></td>
  </tr>


</table>
<?php
include_once('../comm/foot.php');
?>