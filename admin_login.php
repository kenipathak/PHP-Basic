<?php
	include('conn.php');
	session_start();
	if(isset($_REQUEST['admin_login']))
	{
		$anm=$_REQUEST['anm'];
		$apass=$_REQUEST['apass'];
	
		$sel="select * from admin where anm='$anm' and apass='$apass'";
		$exe=$conn->query($sel);
		
		$chk=$exe->num_rows;//check anm and apass
		if($chk==1)
		{
			$_SESSION['admin']=$anm;
			//header('location:show.php');
?>
		<script>
			alert('login success');
			window.location='show.php';
		</script>

<?php
		}
		else
		{
?>
	<script>
		alert('login failed');
		window.location='admin_login.php';
	</script>

<?php
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>admin_login</title>
	</head>
	<body>
	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" border="2">
			<caption>admin_login</caption>
			<tr>
				<td>Name</td>
				<td><input type="text" name="anm"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="apass"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="admin_login" value="login">
				</td>
			</tr>
			
		</table>
	
	</body>
</html>