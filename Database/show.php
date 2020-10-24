<?php

include('conn.php');
session_start();



if(isset($_SESSION['admin']))
{
}
else
{
	header('location:admin_login.php');	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">welcome : <?php echo $_SESSION['admin']?></h1>

<table align="center" border="2">
<caption>User Manage</caption>
	<tr>
    	<th>User Id</th>
        <th>User Name</th>
        <th>User Pass</th>
        <th>User Gen</th>
        <th>User lag</th>
        <th>User country</th>
        <th colspan="3">Manage User</th>
    </tr>
	
    <?php
    $sel="select * from user join country on user.cid=country.cid";  //querry
	$exe=$conn->query($sel);  // run
	while($fetch=$exe->fetch_object())  // fetch data from db
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
        <td><a href="status.php?suid=<?php echo $fetch->uid;?>"><?php echo $fetch->status;?></a></td>

        
        
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