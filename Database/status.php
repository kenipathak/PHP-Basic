<?php


include('conn.php');



if(isset($_REQUEST['suid']))
{
	$uid=$_REQUEST['suid'];
	$sel="select * from reg where uid='$uid'";
	$exe=$conn->query($sel);
	$fetch=$exe->fetch_object();
	$status=$fetch->status;
	
	if($status=="Block")
	{
		$upd="update user set status='Unblock' where uid='$uid'";
		$exe=$conn->query($upd);
		if($exe)
		{
			//header('location:show.php');
			?>
			<script>
			alert('Status Unblock Success');
			window.location='show.php';
			</script>
			<?php
		}	
		
	}
	else
	{
		$upd="update user set status='Block' where uid='$uid'";
		$exe=$conn->query($upd);
		if($exe)
		{
			//header('location:show.php');
			?>
			<script>
			alert('Status Block Success');
			window.location='show.php';
			</script>
			<?php
		}	
	
	}
}

?>