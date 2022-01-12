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