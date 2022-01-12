<?php 
	require "database.php";
	$emailinput = $passinput = '';

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['your-email'])) {
			$emailinput = $_POST['your-email'];
		}
		if (isset($_POST['your-password'])) {
			$passinput = $_POST['your-password'];
		}


/*	$sql = "SELECT * FROM user WHERE Email = '$emailinput' and Password = '$passinput' ";
	$sqlsignin = new database();
	$sqlresultsignin = $sqlsignin->selectdata($sql);

	if ($sqlresultsignin != NULL) {
		header ('Location: http://signin-createnewaccount-form/welcome.php?IDnumber=' .$sqlresultsignin['ID']);
	} else {
		header ('Location: http://signin-createnewaccount-form/create-new-account.php');
	}		
	*/

	$sql = "SELECT * FROM user WHERE Email = '$emailinput' ";
	$sqlsignin = new database();
	$sqlresultsignin = $sqlsignin->selectdata($sql);


	if ($sqlresultsignin != NULL) {
		if ($passinput == $sqlresultsignin['Password']) {
			header ('Location: http://signin-createnewaccount-form/welcome.php?IDnumber=' .$sqlresultsignin['ID']);
		} else {
			echo '<script language="javascript">alert("Email hoặc Mật khẩu không đúng!"); window.location="sign-in.php";</script>';
		}
	} else {
		echo '<script language="javascript">alert("Chưa có tài khoản, vui lòng tạo mới!"); window.location="create-new-account.php";</script>';
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
	<section class="sign-in-form">
		<div class="container-fluid">
			<div class="row">
				<div class="column-12 box-info">
					<form action="sign-in.php" method="POST">
						<img src="deneiyi-logo.png">
						<input type="email" name="your-email" placeholder="Email">
						<input type="password" name="your-password" placeholder="Password">
						<input type="submit" name="your-submit" value="Sign In">
						<a href="#">Quên mật khẩu</a>
						<pre>------------------------------</pre>
						<button><a href="create-new-account.php">Create New Account</a></button>
					</form>	
				</div>
			</div>
		</div>
	</section>
</body>
</html>