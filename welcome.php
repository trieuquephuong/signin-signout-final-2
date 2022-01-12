<?php
	require "database.php";
	$idcus = '';

	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		if (isset($_GET['IDnumber'])){
			$idcus = $_GET['IDnumber'];
		}
	}

	$sql = "SELECT * FROM user WHERE ID = '$idcus'";
	$get_sql = new database ();
	$userinfo = $get_sql->selectdata($sql);
	$userinfo_id = $userinfo['ID'];
/*	var_dump($userinfo);*/
?>
	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome file</title>
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
	<section class="welcome-form">
		<div class="container-fluid">
			<div class="row">
				<div class="column-12 box-info">
					<div class="welcome-box">
						<img src="deneiyi-logo.png">
						<pre>------------------------------</pre>
						<h1>Welcome<h1><br>
						<p>Username: <strong><?php echo $userinfo['Username']; ?></strong></p>
						<p>ID: <strong><?php echo $userinfo['ID']; ?></strong></p>
						<?php echo "<a href='personalinfo.php?IDnumber=$userinfo_id'>Edit Information</a>"; ?> 
					</div>	
				</div>	
			</div>
		</div>
	</section>
</body>
</html>