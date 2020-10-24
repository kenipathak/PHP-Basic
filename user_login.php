<?php
	include('conn.php');
	session_start();
	if(isset($_REQUEST['user_login']))
	{
		$unm=$_REQUEST['unm'];
		$pass=$_REQUEST['pass'];
	
		$sel="select * from user where unm='$unm' and pass='$pass'";
		$exe=$conn->query($sel);
		$fetch=$exe->fetch_object();
		$uid=$fetch->uid;
		
		$chk=$exe->num_rows;//check unm and pass
		if($chk==1)
		{
			$_SESSION['user']=$unm;
			$_SESSION['uid']=$uid;
?>

			<script>
				alert('login success');
				window.location='profile.php';
			</script>

<?php
		}
		else
		{
			?>
			<script>
				alert('login failed');
				window.location='user_login.php';
			</script>
			<?php
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>User_login</title>
	</head>
	<body>
	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" border="2">
			<caption>User_login</caption>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="unm"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="user_login" value="login">
				</td>
			</tr>
			
		</table>
	
	</body>
</html>