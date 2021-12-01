<?php

	session_start();

if (isset($_SESSION['logindata'])) {

	$_SESSION = [];
	
	setcookie(session_name(), session_id(), time()-1000, "/");
	
	session_destroy();	
	
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
  	header('Refresh: 1; url=' . $home_url);


}else{
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index?please login to your account.';
      header('Location: ' . $home_url);

}

?>