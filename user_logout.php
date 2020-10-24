<?php
session_start();
unset($_SESSION['user']);//single
unset($_SESSION['uid']);//single

//session_destroy();
?>
        <script>
		alert('logout Success');
		window.location='user_login.php';
		</script>
        <?php

?>