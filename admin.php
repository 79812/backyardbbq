<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<?php 
include_once("assets/inc/db_conn.php");
session_start();
?>
</br>
<title>Admin panel</title>
<?php if(isset($_SESSION["userid"])) {  ?>
<div class="container">
	<h2>Admin panel</h2>
	<br><br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<a href="logout.php">Logout</a> <br><br>
			
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<?php } else { ?>
		  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
	  <div class="container p-3 my-3">
    <div class="row">
      <div class="col-sm text-center col-md-offset-4 well">
         <p class="navbar-text font-weight-bold">You are Logged Out!</p>
         <a href="login.php" class="btn btn-primary ml-2 font-weight-bold">Login</a>
      </div>
    </div>
  </div>
	<?php } ?>
	<br>
</div>
</div>
</div>
</body>

</html>

