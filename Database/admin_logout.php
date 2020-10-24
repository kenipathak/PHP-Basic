<?php
session_start();
unset($_SESSION['admin']);//single

session_destroy();
?>
        <script>
		alert('logout Success');
		window.location='admin_login.php';
		</script>
        <?php

?>