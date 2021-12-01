<?php

  session_start();

  if(!isset($_SESSION['logindata'])){
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index?please login to your account.';
      header('Location: ' . $home_url);
  }
  
  $title = "User Home";
  require_once './include/header.php';
?>

      <div class="container">
      
      <nav class="navbar navbar-expand-sm bg-dark">
      	<a href="navbar-brand">Bookmarker</a>
		  <!-- Links -->
		  <ul class="navbar-nav ml-auto">
		    <li class="nav-item">
		      <a class="nav-link btn btn-primary btn-sm ml-2" href="http://localhost/BookmarkInterface/profile.php">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link btn btn-warning btn-sm ml-2" href="http://localhost/BookmarkInterface/bookmarkList.php">Bookmark List</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link btn btn-secondary btn-sm ml-2" href="http://localhost/BookmarkInterface/changePassword.php">Change Password</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link btn btn-danger btn-sm ml-2" href="http://localhost/BookmarkInterface/logout">Log out</a>
		    </li>
		  </ul>
	</nav>  	
        	
        <div class="jumbotron">
                 		
            <form action="auth.php" method="POST" class="form-group text-center" id="changePswdForm">
              <label for="oldPassword">Old Password : </label>
              <input type="password" name="oldpasskey" id="oldpasskey" class="form-control text-center"  placeholder="Enter your old password.">
              <label for="newPassword">New Password : </label>
              <input type="password" name="newpasskey" id="newpasskey" class="form-control text-center" placeholder="Enter your New Password.">
              <label for="newPassword">Confirm New Password : </label>
              <input type="password" name="cnewpasskey" id="cnewpasskey" class="form-control text-center" placeholder="Enter your Confirm New Password.">
              <input type="submit" name="changePswdBtn" id="changePswdBtn" class="btn btn-success btn-md mb-4 mt-4 rounded-0" value="Change Password">
            
            <div id="result"></div>

            </form>
            
        </div>
    
      </div>

      <script src="./js/changePassword.js"></script>

<?php

require_once './include/footer.php';
?>