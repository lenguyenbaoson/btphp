<?php
var_dump($_POST);
$fp = @fopen('data/hocsinh.txt', "r");
if (!$fp) {
	echo 'Mở file không thành công';
}
else
{
	while(!feof($fp))
	{
		$dong = fgets($fp);
		$arr = array();
		$arr = explode("#",$dong);
		if (isset($_POST["fix$arr[0]"])) {
			break;
		}
	}
} 
?>
<form method="post" action="bai5.php">
id : 
<input type="text" name="id" value=<?php echo $arr[0] ?>></br>
Từ năm : 
<input type="text" name="fromyear" value=<?php echo $arr[1] ?>> </br>
Đến năm : 
<input type="text" name="toyear" value=<?php echo $arr[2] ?>> </br>
Lớp : 
<input type="text" name="class" value=<?php echo $arr[3] ?>> </br>
Nơi học :
<input type="text" name="address" value=<?php echo $arr[4] ?>>  </br>
<input type="submit" value="Chĩnh sửa">
</form>
