
<?php

include('conn.php');
session_start();


if(isset($_REQUEST['admin_login']))
{
	
	$anm=$_REQUEST['anm'];
	$pass=$_REQUEST['apass'];
	
	$sel="select * from admin where anm='$anm' and pass='$apass'";
	$exe=$conn->query($sel);
	$chk=$exe->num_rows; // check unm & pass by row 
	if($chk==1)
	{
		$_SESSION['admin']=$anm;
		//header('location:show.php');
		?>
        <script>
		alert('login Success');
		window.location='show.php';
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('login Failed');
		window.location='admin_login.php';
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
		<caption>Admin Login Form</caption>
    	<tr>
        	<td>User Name</td>
            <td><input type="text" name="anm"></td>
        </tr>
        
        <tr>
        	<td>Password</td>
            <td><input type="password" name="apass"></td>
        </tr>
        <tr>
         <tr>
        	
            <td>
           	<input type="submit" name="admin_login" value="Sign In">
            </td>
        </tr>
    
    </table>
</form>

</body>
</html>