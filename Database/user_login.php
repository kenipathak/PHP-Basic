
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
	
	$chk=$exe->num_rows; // check unm & pass by row 
	if($chk==1)
	{
		$status=$fetch->status;	
		if($status=="Block")
		{
			
		?>
			<script>
			alert('Login Failed due to Status Block');
			window.location='user_login.php';
			</script>
			<?php		
		}
		else
		{
			
		$uid=$fetch->uid;
		
			
		$_SESSION['user']=$unm;
		$_SESSION['uid']=$uid;
		?>
        <script>
		alert('login Success');
		window.location='profile.php';
		</script>
        <?php
		}
	}
	else
	{
		?>
        <script>
		alert('login Failed');
		window.location='user_login.php';
		</script>
        <?php	
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data">
	
    <table align="center" border="2">
		<caption>User Login Form</caption>
    	<tr>
        	<td>User Name</td>
            <td><input type="text" name="unm"></td>
        </tr>
        
        <tr>
        	<td>Password</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
         <tr>
        	
            <td>
           	<input type="submit" name="user_login" value="Sign In">
            </td>
        </tr>
    
    </table>
</form>

</body>
</html>