<?php
	session_start();
	unset($_SESSION['admin']);
?>
<script>
		alert('Logout Success');
		window.location='admin_login.php';
</script>
<?php
		
?>