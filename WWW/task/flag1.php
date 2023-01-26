<?php
include_once('../inc/const.php');
include_once('../inc/func.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>选择属性</title>
<link href="../inc/css.css" rel="stylesheet" type="text/css" />
</head>
<script>
function checkflag(id,n)
{
	var flag=0;
	for(var i=0;i<n;i++)
	{
		var cb=document.getElementById("flag"+i);
		if(cb!=null&&cb.checked)
		{
			flag+=parseInt(cb.value);
		}
	}
	var inp=opener.document.getElementById(id);
	inp.value=flag;
	close();
}
</script>
<body>
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
<form action='?act=save' method="post">
	<?php
	if(intval($_GET['value'])>0)
	{
		$arr = sy_exist($wow_tflag,$_GET['value']);
	}
	else
	{
		$arr = array();
	}
	for($i=0;$i<sizeof($wow_tflag);$i++)
	{
		if(trim($wow_tflag[$i])!="")
		{
		echo '<tr bgcolor="#353535">';
		$sel = in_array($i,$arr)?' checked':'';
		echo '<td width="30"><input'.$sel.' type="checkbox" name="flag'.$i.'" id="flag'.$i.'" value="'.pow(2,$i).'"></td><td>'.$wow_tflag[$i].'</td>';
		echo '</tr>';
		}
	}
	?>
	<tr>
	<td colspan="2" align="center"><input type="button" value="确定" onclick="checkflag('<?php echo $_GET['id'];?>',<?php echo sizeof($wow_tflag);?>);"></td>
	</tr>
</form>
</table>
<?php
include_once('../comm/foot.php');
?>