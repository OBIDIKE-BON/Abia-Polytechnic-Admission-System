<?php 
require_once 'session.php';
	if(isset($_SESSION['User_name'])){
		unset($_SESSION['User_name']);
                unset($_SESSION['Admin_id']);                
                unset($_SESSION['id']);
                unset($_SESSION['pin']);
		session_destroy();
		header("Location: ../index.php");
	}else{
		unset($_SESSION['User_name']);
                unset($_SESSION['Admin_id']);                
                unset($_SESSION['id']);
                 unset($_SESSION['pin']);
		session_destroy();
		header("Location:../index.php");
	}
?>
