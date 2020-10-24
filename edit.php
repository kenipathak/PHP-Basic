<?php

include('conn.php');
session_start();

if(isset($_REQUEST['euid']))
{
	$uid=$_REQUEST['euid'];
	$sel="select * from user where uid='$uid'";
	$exe=$conn->query($sel);
	$fetch=$exe->fetch_object();
	
	$img=$fetch->file1;
	
	
	if(isset($_REQUEST['update']))
	{
	
		$unm=$_REQUEST['unm'];
		$pass=$_REQUEST['pass'];
		$gen=$_REQUEST['gen'];
		$lag_arr=$_REQUEST['lag'];
		$lag=implode(",",$lag_arr); // convert arr to string
		$cid=$_REQUEST['cid'];
		
			//img upload
		$file1=$_FILES['file1']['name'];  // get file name request
		$path='upload/'.$file1;    // set path
		$tmp_name=$_FILES['file1']['tmp_name']; // create tmp file
		move_uploaded_file($tmp_name,$path); // move tmp file in to path
		
		
		if($_FILES['file1']['size']>0)
		{
		
		$upd="update user set unm='$unm',pass='$pass',gen='$gen',lag='$lag',cid='$cid',file1='$file1' where uid='$uid'";
		
		$exe=$conn->query($upd);
			if($exe)
			{
				unlink('upload/'.$img);
				$_SESSION['user']=$unm;
				//header('location:show.php');
				?>
				<script>
				alert('Update Success');
				window.location='profile.php';
				</script>
				<?php
			}
		}
		else
		{
			$upd="update user set unm='$unm',pass='$pass',gen='$gen',lag='$lag',cid='$cid' where uid='$uid'";
		
		$exe=$conn->query($upd);
			if($exe)
			{
				$_SESSION['user']=$unm;
				//header('location:show.php');
				?>
				<script>
				alert('Update Success');
				window.location='profile.php';
				</script>
				<?php
			}
			
			
		}
		
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
		<caption>Edit Profile Form</caption>
    	<tr>
        	<td>User Name</td>
            <td><input type="text" name="unm" value="<?php echo $fetch->unm;?>"></td>
        </tr>
        
        <tr>
        	<td>Password</td>
            <td><input type="password" name="pass"  value="<?php echo $fetch->pass;?>"></td>
        </tr>
        <tr>
        	<td>Gender</td>
            <td>
            <?php
            $gen=$fetch->gen;
			if($gen=="Male")
			{
			?>
            
            Male:<input type="radio" name="gen" value="Male" checked="checked">
            Female:<input type="radio" name="gen" value="Female">
            <?php
			}
			else
			{
			?>
            Male:<input type="radio" name="gen" value="Male" >
            Female:<input type="radio" name="gen" value="Female" checked="checked">
            
            <?php	
			}
			?>
            </td>
        </tr>
        
        <tr>
        	<td>Laguages</td>
            <td>
            
            Hindi:<input type="checkbox" name="lag[]" value="Hindi" 
            <?php
			$lag=$fetch->lag;
			$lag_arr=explode(',',$lag);
			if(in_array("Hindi",$lag_arr))
			{
				echo "checked=checked";	
			}
			?>>
            English:<input type="checkbox" name="lag[]" value="English"
            <?php
			$lag=$fetch->lag;
			$lag_arr=explode(',',$lag);
			if(in_array("English",$lag_arr))
			{
				echo "checked=checked";	
			}
			?>>
            Gujarati:<input type="checkbox" name="lag[]" value="Gujarati"
            <?php
			$lag=$fetch->lag;
			$lag_arr=explode(',',$lag);
			if(in_array("Gujarati",$lag_arr))
			{
				echo "checked=checked";	
			}
			?>>
            </td>
        </tr>
        
        <tr>
        	<td>Image</td>
            <td><input type="file" name="file1" value="<?php echo $fetch->file1;?>"> <img src="upload/<?php echo $fetch->file1;?>" height="50px" width="50px"></td>
        </tr>
        
        
        <tr>
        	<td>Country</td> 
            <td>
            	<select name="cid">
                <option>---select country---</option>
                <?php
                $sel="select * from country";  //querry
				$exe=$conn->query($sel);  // run
				while($fe=$exe->fetch_object())  // fetch data from db
				{
					if($fe->cid==$fetch->cid)
					{
					
				?>
                <option value="<?php echo $fe->cid;?>" selected="selected">
								<?php echo $fe->cnm;?>
                </option>
               <?php
					}
					else
					{
				?>
                <option value="<?php echo $fe->cid;?>">
								<?php echo $fe->cnm;?>
                </option>
                <?php
                
					}
				}
				?>
                </select>
            </td>
        </tr>
    
    	 <tr>
        	
            <td>
           	<input type="submit" name="update" value="Save">
            </td>
        </tr>
    
    </table>
</form>



</body>
</html>