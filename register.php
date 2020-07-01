<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<?php
include_once("assets/inc/db_conn.php");
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $sql = "INSERT INTO account (email, username, password) VALUES ('".$email."', '".$username."', '".$hashPassword."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "Registration successfully, you will be redirected";
        header('Refresh: 4; url=index.php');
    }
    else{
        echo "Email already exists";
    }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
</head>

<body>
  <div class="container border">
    <div class="row">
      <div class="col-sm text-center well">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <fieldset>
            <legend>Register</legend>
            <div class="form-group">
              <label for="name">Email</label>
              <input type="text" name="email" value="" placeholder="Email" required class="form-control" />
            </div>
            <div class="form-group">
              <label for="name">Username</label>
              <input type="text" name="username" value="" placeholder="Username" required class="form-control" />
            </div>
            <div class="form-group">
              <label for="name">Password</label>
              <input type="password" name="password" value="" placeholder="Password" required class="form-control" />
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
          </fieldset>
      </div>
    </div>
  </div>
  </form>
</body>

</html>