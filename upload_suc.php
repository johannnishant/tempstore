<?php
	session_start();
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
			<h4> Your File has been Successively Uploaded! Here is the Link. </h4>
		</div>
	</div>

	<br>
	<br>


    <div class="container">
    	<div class="center-block">
			<textarea class="form-control" rows="1" cols="20" id="tarea1" readonly="readonly"><?php
					$temp="http://jnishant.com/".$_SESSION["filelink"];
					echo $temp;
					$_SESSION["filelink"]="";
				?></textarea>
		</div>
	</div>

	<br>
	<br>

    <div class="container">
    	<div class="center-block">
			<a href="index.php" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-home"></span> Home </a>
		</div>
	</div>





 <div class ="navbar navbar-inverse navbar-fixed-bottom">
      <div class = "container">
        <p class="navbar-text"> © Johann Nishant 2015 </p>
      </div>
  </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>



</body>

</html>

