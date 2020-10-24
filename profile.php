<?php
	include('conn.php');
	session_start();
	
	if(isset($_SESSION['uid']))
	{
	}
	else
	{
		header('location:user_login.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
	</head>
	<body>
			<?php
				$uid=$_SESSION['uid'];
				$sel="select * from user join country on user.cid=country.cid where user.uid='$uid'";	//query
				$exe=$conn->query($sel);
				while($fetch=$exe->fetch_object())
				{
			?>
		<p align="center"><img src="upload/<?php echo $fetch->file1;?>" height="100px" width="100px" style="border:#000 dotted"></p>
		<h1 align='center'>Welcome : <?php echo $_SESSION['user']?></h1>
		<table align='center' border='2'>
			<caption>User Profile</caption>
				<tr>
					<th>User id</th>
					<th>User name</th>
					<th>Password</th>
					<th>Gender</th>
					<th>Language</th>
					<th>country</th>
					<th>Image</th>
					<th>Edit</th>
				</tr>

				<tr>
					<td><?php echo $fetch->uid;?></td>
					<td><?php echo $fetch->unm;?></td>
					<td><?php echo $fetch->pass;?></td>
					<td><?php echo $fetch->gen;?></td>
					<td><?php echo $fetch->lag;?></td>
					<td><?php echo $fetch->cnm;?></td>
        			<td><img src="upload/<?php echo $fetch->file1;?>" height="50px" width="50px"></td>
        			<td><a href="edit.php?euid=<?php echo $fetch->uid;?>">Edit</a></td>
				</tr>
			<?php
				}
			?>
				<tr>
					<td><a href="user_logout.php">Logout</a></td>
				</tr>
		</table>
	</body>
</html>