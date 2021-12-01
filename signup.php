<?php 
    $title = "Create Bookmark Account";
    require_once './include/header.php'; 	
?>

	<div class="container text-center w-50">
		<center class="text-primary h3 font-weight-normal mt-5">Welcome to Bookmarker</center>
		<form action="auth.php" method="POST" class="form-group" id="signUpForm">
			<label for="Full Name">Full Name : </label>
			<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter your Full Name.">
			<label for="Username">Username : </label>
			<input type="email" name="username" id="username" class="form-control"  placeholder="Enter your username." >
			<label for="Password">Password : </label>
			<input type="password" name="passkey" id="passkey" class="form-control" placeholder="Enter your password." >
			<input type="submit" name="createBtn" id="submitBtn" class="btn btn-success btn-md mt-4 rounded-0" value="Create">
		</form>

		<div id="result">
			
		</div>
		<div id="msg"></div>
	</div>
    
    <!-- JavaScript Codes -->

	<script src="./js/signup.js"></script>

<?php  
    require_once './include/footer.php'; 
?>





