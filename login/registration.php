<?php
    require('inc/db.php');
    // If form submitted, insert values into the database.
    // Define variables and initialize with empty values
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
     
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = :username";
            
            if($stmt = $pdo->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
                
                // Set parameters
                $param_username = trim($_POST["username"]);
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    if($stmt->rowCount() == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            unset($stmt);
        }
        
        // Validate password
        if(empty(trim($_POST['password']))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST['password'])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST['password']);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = 'Please confirm password.';     
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = 'Password did not match.';
            }
        }
        
        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            
            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
             
            if($stmt = $pdo->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
                $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
                
                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            unset($stmt);
        }
        
        // Close connection
        unset($pdo);
    }
    ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Registration</title>
        <link rel="icon" href="img/logo3.png">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2>Register New User</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="name">Username</label>
                    </div>
                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="email">Password</label>
                    </div>
                   <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="password">Confirm Password</label>
                    </div>
                     <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <button type="submit" name="submit" value="Register" class="btn btn-dark"><i class="fa fa-user-plus"></i> Register</button>
                    </div>
                </div>
        </form>
        </div>
    </body>
</html>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>