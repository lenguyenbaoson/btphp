
<?php 
	/**
	 * summary
	 */
	class thongtin
	{
		var $stt;
		var $formyear;
		var $toyear;
		var $class;
		var $noihoc;
	    /**
	     * summary
	     */
	     function __construct( $stt,$formyear,$toyear,$class,$noihoc)
	    {
	        $this->stt=$stt;
	        $this->formyear=$formyear;
	        $this->toyear=$toyear;
	        $this->class=$class;
	        $this->noihoc=$noihoc;
		}
		
	    function display(){ ?>
	    	<tr class="content">
				<td><?php echo $id=$this->stt; ?></td>
				<td><?php echo $this->formyear; ?></td>
				<td><?php echo $this->toyear; ?></td>
				<td><?php echo $this->class; ?></td>
				<td><?php echo $this->noihoc; ?></td>
				<td>
					<form method="post" action="fix.php">
					<input type="submit" name=<?php echo  "fix$id"?>  value="Sửa">
					</form> 
					<form method="post" action="bai5.php">
					<!-- <dialog open>
					<p>Greetings, one and all!</p>
					</dialog> -->
					<input type="submit" name=<?php echo  "delete$id"?>  value="Xóa">
					</form> 
					
				</td>
			</tr>
	    	
	    <?php }
	   
	}
 ?>