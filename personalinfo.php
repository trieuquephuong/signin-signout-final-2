<?php
	require "database.php";
	$idcus = $userinput = $emailinput = $telinput = $passinput ='';

	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		if (isset($_GET['IDnumber'])){
			$idcus = $_GET['IDnumber'];
		}
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
	

	$sql = "SELECT * FROM user WHERE ID = '$idcus'";
	$get_sql = new database ();
	$userinfo = $get_sql->selectdata($sql);


		$sql = "UPDATE user SET Name='$userinput', Email='$emailinput' WHERE ID = '$idcus'";
		$sqlupdate = new database();
		$resultupdate = $sqlcheckdata->selectdata($sql);


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
	<section class="personal-info">
		<div class="container-fluid">
			<div class="row">
				<div class="column-12 box-info">
					<form action="personalinfo.php" method="POST">
						<img src="deneiyi-logo.png">
						<p><input type="hidden" name="your-ID" value="<?php echo $userinfo['ID']; ?>"</p><!-- //Bắt buộc có biến ID nhưng ẩn nó đi nên dùng type="hidden" -->
						<p><strong>Full name:</strong><input type="text" name="your-fullname" placeholder="Full name"></p>
						<p><strong>Username:</strong><input type="text" name="your-username" value="<?php echo $userinfo['Username']; ?>"</p>
						<p><strong>Email: </strong> <?php echo $userinfo['Email'] ?> </p>
						<p><strong>Phone number: </strong><?php echo $userinfo['Telephone'] ?></p>
						<p><strong>Birthday: </strong><input type="date" name="your-birthday"></p>
						<div class="choose-gender">
							<p><strong>Gender: </strong></p>
							<input type="radio" name="gender" value="female">Female
							<input type="radio" name="gender" value="male">Male
							<input type="radio" name="gender" value="others">Others
						</div>
						<p><strong>Password: </strong><input type="pwd" name="your-password" placeholder="Password"></p>
						<input type="submit" name="your-submit" value="Cập nhật">
					</form>	
				</div>
			</div>
		</div>
	</section>
</body>
</html>