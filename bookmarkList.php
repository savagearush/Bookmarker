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
      	<a href="navbar-brand">Bookmarker</a>2
		  <!-- Links -->
		  <ul class="navbar-nav ml-auto">
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
			
			  <ul id="bookmarkList">
				<?php
					require_once "init.php";
					
					$query = "SELECT webName, webUrl FROM webdb WHERE id = " . $_SESSION['logindata']['id'];
					$stmt = $conn->prepare($query);
					$stmt->execute();

					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						echo  "<li><a href='https://".  $row['webUrl'] . "' target='_blank'><div class='alert alert-primary' >" . $row['webName'] . "</div></a></li>";
					}

				?>
				</ul>
		</div>
      </div>

<?php
require_once './include/footer.php';
?>