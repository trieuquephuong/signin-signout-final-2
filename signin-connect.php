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

	$sql = "SELECT * FROM user WHERE Email = '$emailinput' and Password = '$passinput' ";
	$sqlsignin = new database();
	$sqlresultsignin = $sqlsignin->selectdata($sql);

	/*var_dump($sqlresultsignin);*/

	if ($sqlresultsignin != NULL) {
		header ('Location: http://signin-createnewaccount-form/welcome.php?IDnumber=' .$sqlresultsignin['ID']);
	} else {
		header ('Location: http://signin-createnewaccount-form/create-new-account.php');
	}

	}
?>
