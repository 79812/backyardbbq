<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<?php
session_start();
include_once("assets/inc/db_conn.php");
// If user already logged in, send them to admin panel
if (isset($_SESSION['userid'])) {
header('Location:admin.php');
}

if(isset($_POST['submit'])){
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $sql = "SELECT * FROM account WHERE email = '".$email."'";
  $rs = mysqli_query($conn,$sql);
  $numRows = mysqli_num_rows($rs);
  if($numRows  == 1){
    $row = mysqli_fetch_assoc($rs);
    if(password_verify($password,$row['password'])){
      echo "Password verified";
      header ( 'Location: admin.php' );
      $_SESSION["userid"]=$row["username"];
    }
    else{
      echo "Wrong Password";
    }
  }
  else{
    echo "No User found";
  }
}
?>
<title>Login</title>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div class="container border">
  <div class="row">
    <div class="col-md text-center well">
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
          <legend>Login</legend>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" value="" placeholder="Email" required class="form-control" />
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" name="password" value="" placeholder="Password" required class="form-control" />
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn btn-primary" />
            <a href="register.php" class="btn btn-primary">Register Now</a>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</body>

</html>