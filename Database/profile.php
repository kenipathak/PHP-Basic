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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">welcome : <?php echo $_SESSION['user']?></h1>
<table align="center" border="2">
<caption>User Profile</caption>
	<tr>
    	<th>User Id</th>
        <th>User Name</th>
        <th>User Pass</th>
        <th>User Gen</th>
        <th>User language</th>
        <th>User country</th>
    </tr>
	
    <?php
	
	$uid=$_SESSION['uid'];
    $sel="select * from user join country on user.cid=country.cid where user.uid='$uid'";  //querry
	$exe=$conn->query($sel);  // run
	while($fetch=$exe->fetch_object())  // fetch data from db
	{
	?>
	<tr>
    	<td><?php echo $fetch->uid;?></td>
        <td><?php echo $fetch->unm;?></td>
        <td><?php echo $fetch->pass;?></td>
        <td><?php echo $fetch->gen;?></td>
        <td><?php echo $fetch->lan;?></td>
        <td><?php echo $fetch->cnm;?></td>
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