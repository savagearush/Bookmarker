<?php
	session_start();

	if(isset($_SESSION['logindata'])){
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/profile';
      header('Location: ' . $home_url);
	} 

	$title = "Welcome To Bookmark";
	require_once './include/header.php'; 
?>

	<div class="container text-center w-50 border border-botton-primary">
		<center class="text-primary h3 font-weight-normal mt-5">Welcome to Bookmarker</center>

		<div class="btn btn-group mb-5">
			<a class="btn btn-success" href="login">Login</a>
			<a class="btn btn-primary" href="signup">SignUp</a>
		</div>

	</div>

<?php  

	require_once './include/footer.php'; 
?>