<?php
	include('conn.php');
	
	if(isset($_REQUEST['duid']))
	{
		$uid=$_REQUEST['duid'];
		$sel="delete from user where uid='$uid'";
		$exe=$conn->query($sel);
		if($exe)
		{
			//header('location:show.php');
			?>
			<script>
				alert('Delete Success');
				window.location='show.php';
			</script>
			<?php
		}
	}

?>