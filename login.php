

<?php
	session_start();

	if(isset($_SESSION['logindata'])){
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/profile';
  		header('Refresh: 1; url=' . $home_url);
	} 

	$title = "Bookmark Login";
	require_once './include/header.php';

?>

	<div class="container text-center w-50">
		<center class="text-primary h3 font-weight-normal mt-5">Welcome to Bookmarker</center>
		<form action="auth.php" method="POST" class="form-group" id="loginForm">
			<label for="Username">Username : </label>
			<input type="email" name="username" id="username" class="form-control text-center"  placeholder="Enter your username.">
			<label for="Password">Password : </label>
			<input type="password" name="passkey" id="passkey" class="form-control text-center" placeholder="Enter your password.">
			<input type="submit" name="loginBtn" id="LoginBtn" class="btn btn-success btn-md mt-4 rounded-0" value="Login">
		</form>

		<div id="result"></div>
		<div id="msg"></div>
	</div>



        <script src="./js/login.js"></script>
<?php  

	require_once './include/footer.php'; 
?>