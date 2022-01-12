<?php 
	require "database.php";


	$userinput = $emailinput = $telinput = $passinput = ' ';

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['your-email'])) {
			$emailinput = $_POST['your-email'];
		}	
		if (isset($_POST['your-username'])) {
			$userinput = $_POST['your-username'];
		}
		if (isset($_POST['your-phone'])) {
			$telinput = $_POST['your-phone'];
		}
		if (isset($_POST['your-password'])) {
			$passinput = $_POST['your-password'];
		}

		$sql = "SELECT * FROM user WHERE Email = '$emailinput'";
		$sqlcheckdata = new database();
		$resultdata = $sqlcheckdata->selectdata($sql);


		if ($resultdata != NULL) {
			header('Location: http://signin-createnewaccount-form/sign-in.php');
		} else {
			$sql = "INSERT INTO user (Username, Email, Telephone, Password) 
				VALUES ('$userinput', '$emailinput', '$telinput', '$passinput')";

			$sqlcheckdata->inputdata($sql);
		}

	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign in form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section class="create-new-account-form">
		<div class="container-fluid">
			<div class="row">
				<div class="column-12 box-info">
					<form action="createnewaccount-connect.php" method="POST">
						<img src="deneiyi-logo.png">
						<input type="text" name="your-username" placeholder="Username">
						<input type="email" name="your-email" placeholder="Email">
						<input type="tel" name="your-phone" placeholder="Phone number">
						<input type="pwd" name="your-password" placeholder="Password">
						<input type="submit" name="your-submit" value="Create New Account">
						<pre>------------------------------</pre>
						<button><a href="sign-in.php">Sign In</a></button>
					</form>	
				</div>
			</div>
		</div>
	</section>
</body>
</html>
