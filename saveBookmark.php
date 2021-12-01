<?php
	session_start();
	
	require_once 'init.php';

	if(isset($_POST['save'])){
		$user = new user;
		$id = $_SESSION['logindata']['id'];
		$status3 = $user->saveBookmark($_POST, $conn, $id);
		echo $status3;
	}
