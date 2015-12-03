<?php
	session_start(); // Starting Session for supporting Session Variables
?>

<html>

	<body>

	<?php

		$pass = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  $pass = test_input($_POST["ps"]);	// Function test_input avoids SQL Injection

		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}


		if ($pass)
		{
			// Here are the login details for the MySQL Server 

			// Enter your own DB Details
			$user =;
			$password =;
			$db =;
			$host =;
			$port =;

			$link = mysqli_init();
			if (!$link) {
			    die('mysqli_init failed');
			}


			if (!$link->real_connect($host,$user,$password,$db,$port)) 
			{
			    die('Connect Error (' . mysqli_connect_errno() .')'. mysqli_connect_error());
			}
			
			$sql= "SELECT * FROM tempstorage.userinfo WHERE keyphrase='$pass'";
			$result=mysqli_query($link,$sql);
			$count=mysqli_num_rows($result);

			if($count==1)
			{	// Count can be 1 only if Password is in DB
				$_SESSION["pass"]=2;
				// Session pass set to 2 for not allowing direct access to upload page
				?>
		  			<script>window.location = 'uploadpage.php';</script>
				<?php 
			}
			else
			{
				$_SESSION["pass"]=1;
				?>
		  			<script>window.location = 'index.php';</script>
				<?php 
			}

		}
		else
		{ 	// This segment can only be executed if the passcode is empty
			$_SESSION["pass"]=1;
			?>
				<script>window.location = 'index.php';</script>
			<?php 
		}
	?>

	</body>

</html>