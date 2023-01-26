<?php
include_once('../inc/const.php');
include_once('../inc/value.php');
include_once('../inc/func.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>选择奖励</title>
<link href="../inc/css.css" rel="stylesheet" type="text/css" />
</head>
<script>
var num=0;
function checkflag(id,frm)
{
	var fv=0;
	fv=document.getElementById("flag"+num).value;
	var inp=opener.document.getElementById(id);
	inp.value=fv;
	close();
}

function checkone(n)
{
	num=n;
}
</script>
<body>

<form action='?act=save' method="post">
<div style="height:300px;overflow:auto;">
	<?php
	reset($wow_give);
	$i = 0;
	while (list($key, $val) = each($wow_give)) 
	{
		echo '<div bgcolor="#353535">';
		$sel = intval($_GET['value'])==intval($key)?' checked':'';
		echo '<div width="30"><input'.$sel.' type="radio" name="flag" onclick="checkone('.intval($key).')" id="flag'.intval($key).'" value="'.$key.'"></td><td>'.$val.'</div>';
		echo '</div>';
		$i++;
		/*
		if(trim($val)!='')
		{
			$sel = (trim($value)<>''&&intval($value)==$key)?' selected':'';
			$str .= '<option value="'.$key.'"'.$sel.'>'.$val.'</option>';
		}
		*/
		//echo "$key => $val\n";
	}
	/*
	for($i=0;$i<sizeof($wow_work);$i++)
	{
		echo '<tr bgcolor="#353535">';
		$sel = intval($_GET['value'])==$i?' checked':'';
		echo '<td width="30"><input'.$sel.' type="checkbox" onclick="checkone('')" name="flag'.$i.'" id="flag'.$i.'" value="'.pow(2,$i).'"></td><td>'.$wow_work[$i].'</td>';
		echo '</tr>';
	}
	*/
	?>
</div>
	<p align="center"><input type="button" value="确定" onclick="checkflag('<?php echo $_GET['id'];?>',this.form);"></P>
</form>
<?php
include_once('../comm/foot.php');
?>