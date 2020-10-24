<?php
	include('conn.php');

if(isset($_REQUEST['submit']))
{
	$unm=$_REQUEST['unm'];
	$pass=$_REQUEST['pass'];
	$gen=$_REQUEST['gen'];
	$lag_arr=$_REQUEST['lag'];
	$lag=implode(",",$lag_arr);//array convert to string
	
	$cid=$_REQUEST['cid'];

		//img upload
	$file1=$_FILES['file1']['name'];  // get file name request
	$path='upload/'.$file1;    // set path
	$tmp_name=$_FILES['file1']['tmp_name']; // create tmp file
 	move_uploaded_file($tmp_name,$path); // move tmp file in to path

	
	$ins="insert into user(unm,pass,gen,lag,cid,file1)values('$unm','$pass','$gen','$lag','$cid','$file1')";
	$exe=$conn->query($ins);
	if($exe)
	{
		echo "insert success";
	}
	else
	{
		echo "not success";
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>form</title>
	</head>
	<body>
	
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" border="2">
			<caption>Registraion</caption>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="unm"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
				Male<input type="radio" name="gen" value="Male">
				Female<input type="radio" name="gen" value="Female">
				</td>
			</tr>
			<tr>
				<td>lagguage</td>
				<td>
					Hindi<input type="checkbox" name="lag[]" value="Hindi">
					English<input type="checkbox" name="lag[]" value="English">
					Gujarati<input type="checkbox" name="lag[]" value="Gujarati">
				</td>
			</tr>
			<tr>
				<td>Country</td>
				<td>
					<select name="cid">
					<option>---select country---</option>
					<?php
					$sel="select * from country";
					$exe=$conn->query($sel);
					while($fetch=$exe->fetch_object())
					{
					?>
					<option value="<?php echo $fetch->cid;?>">
							<?php echo $fetch->cnm;?>
					</option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>

		    <tr>
        		<td>Image</td>
            	<td><input type="file" name="file1"></td>
        	</tr>
				
			<tr>
				<td>
					<input type="submit" name="submit" value="submit">
				</td>
			</tr>
			
		</table>
	
	</body>
</html>