<?php 
session_start();

require_once './init.php';
	
	if(isset($_POST['createBtn'])){
		$user = new user;
		$status1 = $user->signup($_POST, $conn);
		echo $status1;
	}

	if(isset($_POST['loginBtn'])){
		$user = new user;
		$status2 = $user->login($_POST, $conn, $_SESSION);
		echo $status2;
	}

	if(isset($_POST['changePswdBtn'])){
		$user = new user;
		$status3 = $user->changePassword($_POST, $conn);
		sleep(2);
		echo $status3;


	}


	



 ?>