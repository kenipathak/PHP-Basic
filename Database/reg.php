<?php

include('conn.php');



if(isset($_REQUEST['submit']))
{
	
	$unm=$_REQUEST['unm'];
	$pass=$_REQUEST['pass'];
	$gen=$_REQUEST['gen'];
	$lag_arr=$_REQUEST['lag'];
	$lag=implode(",",$lag_arr); // convert arr to string
	$cid=$_REQUEST['cid'];
	
	$ins="insert into user(unm,pass,gen,lag,cid)values('$unm','$pass','$gen','$lag','$cid')";
	$exe=$conn->query($ins);
	if($exe)
	{
		echo "insert success";	
	}
	else
	{
		echo "Not success";	
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
		<caption>Registration Form</caption>
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
            Male:<input type="radio" name="gen" value="Male">
            Female:<input type="radio" name="gen" value="Female">
            </td>
        </tr>
        
        <tr>
        	<td>Laguages</td>
            <td>
            Hindi:<input type="checkbox" name="lag[]" value="Hindi">
            English:<input type="checkbox" name="lag[]" value="English">
            Gujarati:<input type="checkbox" name="lag[]" value="Gujarati">
            </td>
        </tr>
        
        <tr>
        	<td>Country</td> 
            <td>
            	<select name="cid">
                <option>---select country---</option>
                <?php
                $sel="select * from country";  //querry
				$exe=$conn->query($sel);  // run
				while($fetch=$exe->fetch_object())  // fetch data from db
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
        	
            <td>
           	<input type="submit" name="submit" value="submit">
            </td>
        </tr>
    
    </table>
</form>



</body>
</html>