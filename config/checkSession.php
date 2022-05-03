<?php session_start();
	if($_SESSION['USER']==''){
		header('Location: /dorm_manager/page/login'); 
	}
?>