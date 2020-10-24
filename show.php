<?php
	include('conn.php');

	session_start();
	if(isset($_SESSION['admin']))
	{
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
?>

<html>
<head>
	<title>Show page</title>
</head>
<body>
<h1 align='center'>Welcome : <?php echo $_SESSION['admin']?></h1>
<table align='center' border='2'>
	<caption>Manage</caption>
		<tr>
			<th>User id</th>
			<th>User name</th>
			<th>Password</th>
			<th>Gender</th>
			<th>Language</th>
			<th>country</th>
		</tr>
		<?php
			$sel="select * from user join country on user.cid=country.cid";	//query
			$exe=$conn->query($sel);
			while($fetch=$exe->fetch_object())
			{
		?>
		<tr>
				<td><?php echo $fetch->uid;?></td>
				<td><?php echo $fetch->unm;?></td>
				<td><?php echo $fetch->pass;?></td>
				<td><?php echo $fetch->gen;?></td>
				<td><?php echo $fetch->lag;?></td>
				<td><?php echo $fetch->cnm;?></td>
				<td><a href="delete.php?duid=<?php echo $fetch->uid;?>">Delete</a></td>
		</tr>
		<?php
			}
		?>
		<tr>
			<td><a href="admin_logout.php">Logout</a></td>
		</tr>
	</table>
</body>
</html>