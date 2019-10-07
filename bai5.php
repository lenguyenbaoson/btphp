
	  <!-- Custom styles for this template-->
<?php include_once("nav.php"); ?>

	  <style type="text/css">
	  	.title{
	  		height: 50x;
	  		background-color:#000;
	  		color: #fff;
	  		text-align: center;

	  	}
	  	.content{
	  		text-align: center;
	  		height: 60px;
	  	}
	  	button{
	  		background-color: #FFF;
	  		border-radius: 5px ;
	  		border: 1px solid;
	  	}
	  </style>
</head>
<body>
	<div class="container">
	<form method="post" action="add.php">
	<input type = "submit" value = "Thêm"> 
	</form>

	</form>
		<table width="1000px" border="1px">
			<tr class="title" border: >
				<td>id</td>
				<td>Từ năm</td>
				<td>Đến năm</td>
				<td>Lớp</td>
				<td>Nơi học</td>
				<td>Thao tác</td>
			</tr>
			<?php 
				include_once("model/thongtin.php");
				$ktcheckadd=0;
				$fp = @fopen('data/hocsinh.txt', "r");
				if (!$fp) {
					echo 'Mở file không thành công';
				}
				else
				{
					$arrfull = array();
					// Lặp qua từng dòng để đọc
					while(!feof($fp))
					{
						// echo fgets($fp);
						$dong = fgets($fp);
						if ($dong==""||$dong==null||strlen($dong)<=4) continue;
						
						$arr = array();
						$arr = explode("#",$dong);
						
						$thongtin=new thongtin($arr[0],$arr[1],$arr[2],$arr[3],$arr[4]);
						if (!isset($_POST["delete$arr[0]"])) {
							$arrfull[] = $dong;
							$thongtin->display();
						}
						
						echo '<br>';
					}
					var_dump($_POST);
					
					
						$kt=1; 
						foreach ($arrfull as $key=>$value) {
							$arr = explode("#",$value);
							if (isset($_POST["id"]))
							if ($arr[0]==$_POST["id"]) {
								$kt=0;
								$arrfull[$key]= $_POST["id"].'#'.$_POST["fromyear"].'#'.$_POST["toyear"].'#'.$_POST["class"].'#'.$_POST["address"]."\r\n";
								echo $key;
								?> <META http-equiv="refresh" content="0;URL=bai5.php"> <?php 
								break;
							}
							if (isset($_POST["idadd"]))
							if ($arr[0]==$_POST["idadd"]) {
								$ktcheckadd=1;
							}
						}
						if (isset($_POST["id"]))
						if ($kt) echo 'Không tồn tại id';
					
					if (isset($_POST["idadd"])&&$ktcheckadd==0) {
						$arrfull[]= "\r\n".$_POST["idadd"].'#'.$_POST["fromyear"].'#'.$_POST["toyear"].'#'.$_POST["class"].'#'.$_POST["address"];
						?> <META http-equiv="refresh" content="0;URL=bai5.php"> <?php 
					}
					if ($ktcheckadd) {
						echo 'id đã tồn tại';
					}
					$fp1 = @fopen('data/hocsinh.txt', "w");
					foreach ($arrfull as $value) {
						
						fwrite($fp1,$value);
					}
					fclose($fp);
					fclose($fp1);
				}
				
				
			 ?>
			 
		</table>
	</div>


	