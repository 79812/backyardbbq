<?php
	$errormessages = array();
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
	
	//user has sent the form using the submit
	$message = "User has sent the form </br> ";
	
	$errormessages = array();
	
		$firstname = $_POST['clientFirstName'];
		$lastname = $_POST['clientLastName'];
	    $streetname = $_POST['clientStreetName'];
	    $housenumber = $_POST['clientHouseNumber'];
	    $city   = $_POST['clientCity'];
	    $zipcode = $_POST['clientZipcode'];
	    $phonenumber = $_POST['clientPhoneNumber'];
	    $email = $_POST['clientEmail'];
	    $duration = $_POST['orderDuration'];
		
	 if ($_POST['firstName'] == "")
	 {
	 	$errormessages[]= "You forgot your first name";
	 }
	 if ($_POST['lastName'] == "")
	 {
	 	$errormessages[]= "You forgot your last name";
	 }
	 if ($_POST['messageTitle'] == "")
	 {
	 	$errormessages[]= "You forgot your message title";
	 }if ($_POST['message'] == "")
	 {
	 	$errormessages[]= "You forgot your message";
	 }
	 if ($_POST['email'] == "")
	 {
	 	$errormessages[]= "You forgot your email";
	 }
	 if ($_POST['website'] == "")
	 {
	 	$errormessages[]= "You forgot your website";
	 }
	
	if(count($errormessages) == 0){
		$sql = "INSERT INTO orders (clientFirstName, clientLastName, clientStreetName,clientHouseNumber, clientCity, clientZipcode, clientPhoneNumber, clientEmail, orderStartDate, orderDuration, orderDelivery, productId, orderDate, orderPrice) VALUES ('".$_POST["clientFirstName"]."','".$_POST["clientLastName"]."','".$_POST["clientStreetName"]."','".$_POST["clientHouseNumber"]."','".$_POST["clientCity"]."','".$_POST["clientZipcode"]."','".$_POST["clientPhoneNumber"]."','".$_POST["clientEmail"]."','".$_POST["FILL IN"]."','".$_POST["FILL IN"]."')";
	
		$result = mysqli_query($conn,$sql);
	
	}
	
	
	}
	else
	{
	$message = "User has not yet send the form";
	}
	
	$selectSQL = "SELECT firstName, insertion, lastName, messageTitle, message, email , website FROM form ORDER BY id DESC";
	
	$result = $conn->query($selectSQL);
	
	?>
		<form action="index.php" method="POST">
			<header id="header">
				<h1>Welcome to the guestbook</h1>
				<nav id="main-nav">
				</nav>
			</header>
			<fieldset>
				<legend></br> My guestbook</legend>
				<label>First name*</label></br>
				<input class="form-control" type="text" name="firstName" placeholder="Enter your first name"/></br></br>
				<label>Last name*</label></br>
				<input class="form-control" type="text" name="insertion" placeholder="Enter your insertion name"/></br></br>
				<label>Street name*</label></br>
				<input class="form-control" type="text" name="lastName" placeholder="Enter your last name"/></br></br>
				<label>House Number*</label></br>
				<textarea class="form-control" name="messageTitle" placeholder="Your message title goes here..."></textarea>
				</br></br>
				<label>City*</label></br>
				<textarea class="form-control"  name="message" placeholder="Your message goes here..."></textarea>
				</br></br>
				<label>Zip code*</label></br>
				<input class="form-control" type="text" name="email" placeholder="Enter your email"></input></br></br>
				<label>Phone number*</label></br>
				<input class="form-control" type="text" name="website" placeholder="Enter your website"></input></br></br>
				<label>Email*</label></br>
				<input class="form-control" type="text" name="website" placeholder="Enter your website"></input></br></br>
				<input class="form-control" type="submit" name="save" value="Save" />

				<script> function clearform()
					{
						$errormessages.value = '';
						$firstName.value ='';
						$insertion.value ='';
						$lastName.value = '';
						$messageTitle.value = '';
						$message.value = '';
						$email.value = '';
						$website.value = '';
					    
					}
				</script>
				<?php
					echo $message;
					echo "<br/>";
					//var_dump($_POST);
					
					foreach($errormessages as $error)
					{
						echo $error;
						echo "<br/>";
					}
					
					?>
			</fieldset>