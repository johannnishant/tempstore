<?php

	session_start();	// Session is started to support Session Variables
	if($_SESSION['pass']!=2) // pass can only be 2 if passcode accepted by pcheck
	{	
		?>
  		<script>window.location = 'index.php';</script>
		<?php 
	}
	else
	{
		$_SESSION["pass"]=0;
		// Pass set to 0 to continue procedure 
		// Future : Implement method to avoid re-entry of passcode
	}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>TempStore</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/ts.css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>


	<body>
		<br>
	    <br>
	    <br>
	    <br>
	    <br>
		<div class="container">
			<div class="center-block">
				<form action="upload.php" method="post" enctype="multipart/form-data" role="form">
				    <div class="form-group">
				    <br>				
				    <label class="btn btn-block btn-info" for="file_to_upload">
				        <input name="file_to_upload" id="file_to_upload" type="file" style="display:none;">
				        Choose
				    </label>
				    <br>
				    <br>				    
				    <button type="submit" class="btn btn-block btn-success">Upload</button>
					</div>
				</form>
			</div>
		</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

	</body>


</html>

