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
        <li style="color: white;"> Welcome, <?php echo $_SESSION['logindata']['name']; ?></li>
		    <li class="nav-item">
		      <a class="nav-link btn btn-primary btn-sm ml-2" href="http://localhost/BookmarkInterface/profile">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link btn btn-warning btn-sm ml-2" href="http://localhost/BookmarkInterface/bookmarkList">Bookmark List</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link btn btn-secondary btn-sm ml-2" href="http://localhost/BookmarkInterface/changePassword">Change Password</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link btn btn-danger btn-sm ml-2" href="http://localhost/BookmarkInterface/logout">Log out</a>
		    </li>
		  </ul>
	</nav>  	
        	
       <div class="jumbotron">
        <form action="saveBookmark.php" method="POST" id="form">
       		<fieldset class="form-group text-center">
          		<legend class="text-danger mb-5">Save your Website</legend>
          		<input type="text" class="form-control" name="siteName" id="siteName" placeholder="Website Name eg. Example"><br>
          		<input type="text" class="form-control" name="siteUrl" id="siteUrl" placeholder="Website Url eg. www.example.com"><br>
          		<input type="submit" class="btn btn-success btn-sm pl-4 pr-4 rounded-0" id="sbtbtn" name="save"></input>
        	</fieldset>         
        </form>       
        <div id="result"></div>
       </div>
			</div>

    <script src="./js/saveBookmark.js"></script>

<?php

require_once './include/footer.php';
?>