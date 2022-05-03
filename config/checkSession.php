<?php session_start();
	if(empty($_SESSION['USER']) || $_SESSION['USER']==''){
		header('Location: /page/login'); 
	}
?>